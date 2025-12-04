<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seleksi;
use App\Models\PeriodeSeleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeleksiController extends Controller
{
    /**
     * Tampilkan halaman seleksi admin
     */
    public function index(Request $request)
    {
        // Ambil periode yang dipilih atau periode aktif
        $periodeId = $request->input('periode_id');
        
        if (!$periodeId) {
            $periodeAktif = PeriodeSeleksi::aktif()->first();
            $periodeId = $periodeAktif?->id;
        }
        
        // Ambil semua periode untuk dropdown
        $periodes = PeriodeSeleksi::orderBy('tanggal_mulai', 'desc')->get();
        
        $query = User::where('role', 'PENDAFTAR')
            ->whereNotNull('nilai_smt1')
            ->with(['berkas', 'prestasis', 'seleksi']);
        
        // Filter berdasarkan periode jika ada
        if ($periodeId) {
            $query->where('periode_id', $periodeId);
        }
        
        $pendaftar = $query->get()
            ->map(function($user) {
                // Hitung rata-rata nilai
                $user->avg = round(
                    ($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + 
                     $user->nilai_smt4 + $user->nilai_smt5) / 5, 
                    2
                );
                
                // Hitung poin prestasi
                $user->poin_prestasi = $this->hitungPoinPrestasi($user->prestasis);
                
                // Total nilai
                $user->nilai_total = $user->avg + $user->poin_prestasi;
                
                return $user;
            })
            ->sortByDesc('nilai_total');

        $periode = PeriodeSeleksi::find($periodeId);

        return view('admin.seleksi', compact('pendaftar', 'periodes', 'periode'));
    }

    /**
     * Proses seleksi otomatis berdasarkan kriteria dan periode
     */
    public function prosesSeleksiOtomatis(Request $request)
    {
        $periodeId = $request->input('periode_id');
        
        if (!$periodeId) {
            return redirect()->back()->with('error', 'Pilih periode terlebih dahulu.');
        }
        
        $periode = PeriodeSeleksi::findOrFail($periodeId);
        
        // Cek apakah periode masih aktif
        if (!$periode->isAktif()) {
            return redirect()->back()->with('error', 'Periode seleksi tidak aktif atau sudah berakhir.');
        }
        
        $batasLulus = $periode->batas_lulus;
        $kuota = $periode->kuota;

        // Ambil pendaftar yang sudah approved untuk periode ini
        $pendaftar = User::where('role', 'PENDAFTAR')
            ->where('status', 'approved')
            ->where('periode_id', $periodeId)
            ->whereNotNull('nilai_smt1')
            ->get()
            ->map(function($user) {
                $user->avg = round(
                    ($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + 
                     $user->nilai_smt4 + $user->nilai_smt5) / 5, 
                    2
                );
                $user->poin_prestasi = $this->hitungPoinPrestasi($user->prestasis);
                $user->nilai_total = $user->avg + $user->poin_prestasi;
                return $user;
            })
            ->sortByDesc('nilai_total');

        $lulus = 0;

        foreach ($pendaftar as $user) {
            if ($lulus < $kuota && $user->nilai_total >= $batasLulus) {
                $status = 'Lulus';
                $catatan = 'Lulus seleksi otomatis dengan nilai total: ' . $user->nilai_total;
                $lulus++;
            } else {
                $status = 'Tidak Lulus';
                $catatan = 'Tidak memenuhi kriteria atau kuota penuh';
            }

            // Simpan atau update seleksi
            Seleksi::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'periode_id' => $periodeId
                ],
                [
                    'nilai_total' => $user->nilai_total,
                    'status' => $status,
                    'catatan' => $catatan,
                    'updated_by' => Auth::id(),
                ]
            );

            // Update status seleksi di tabel users
            $user->status_seleksi = $status;
            $user->save();
        }

        return redirect()->route('admin.seleksi.index', ['periode_id' => $periodeId])
            ->with('success', "Seleksi otomatis selesai. {$lulus} siswa lulus dari {$pendaftar->count()} pendaftar.");
    }

    /**
     * Update status seleksi manual
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Lulus,Tidak Lulus,Dipertimbangkan',
            'catatan' => 'nullable|string|max:500',
            'periode_id' => 'required|exists:periode_seleksi,id',
        ]);

        $user = User::findOrFail($id);
        
        // Hitung nilai total
        $avg = round(
            ($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + 
             $user->nilai_smt4 + $user->nilai_smt5) / 5, 
            2
        );
        $poinPrestasi = $this->hitungPoinPrestasi($user->prestasis);
        $nilaiTotal = $avg + $poinPrestasi;

        // Simpan ke tabel seleksi
        Seleksi::updateOrCreate(
            [
                'user_id' => $user->id,
                'periode_id' => $request->periode_id
            ],
            [
                'nilai_total' => $nilaiTotal,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'updated_by' => Auth::id(),
            ]
        );

        // Update status di tabel users
        $user->status_seleksi = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'Status seleksi berhasil diperbarui.');
    }

    /**
     * Hitung poin prestasi berdasarkan tingkat
     */
    private function hitungPoinPrestasi($prestasis)
    {
        $totalPoin = 0;
        
        foreach ($prestasis as $prestasi) {
            switch ($prestasi->tingkat) {
                case 'Nasional':
                    $totalPoin += 10;
                    break;
                case 'Provinsi':
                    $totalPoin += 7;
                    break;
                case 'Kota':
                    $totalPoin += 5;
                    break;
                case 'Sekolah':
                    $totalPoin += 3;
                    break;
            }
        }
        
        return $totalPoin;
    }

    /**
     * Export hasil seleksi ke PDF
     */
    public function exportPdf(Request $request)
    {
        $periodeId = $request->input('periode_id');
        
        $query = User::where('role', 'PENDAFTAR')
            ->whereNotNull('nilai_smt1');
        
        if ($periodeId) {
            $query->where('periode_id', $periodeId);
        }
        
        $pendaftar = $query->get()
            ->map(function($user) {
                $user->avg = round(
                    ($user->nilai_smt1 + $user->nilai_smt2 + $user->nilai_smt3 + 
                     $user->nilai_smt4 + $user->nilai_smt5) / 5, 
                    2
                );
                
                $user->poin_prestasi = $this->hitungPoinPrestasi($user->prestasis);
                $user->nilai_total = $user->avg + $user->poin_prestasi;
                
                return $user;
            })
            ->sortByDesc('nilai_total');

        $periode = PeriodeSeleksi::find($periodeId);

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.seleksi_pdf', compact('pendaftar', 'periode'));
            return $pdf->download('hasil_seleksi_' . ($periode ? $periode->nama_periode : 'semua') . '_' . date('Y-m-d') . '.pdf');
        }
        
        return $this->exportPdfSimple($pendaftar, $periode);
    }

    /**
     * Export PDF sederhana
     */
    private function exportPdfSimple($pendaftar, $periode = null)
    {
        $periodeName = $periode ? $periode->nama_periode : 'Semua Periode';
        $periodeInfo = $periode ? '<p><strong>Periode:</strong> ' . $periode->nama_periode . ' (' . $periode->tanggal_mulai->format('d/m/Y') . ' - ' . $periode->tanggal_selesai->format('d/m/Y') . ')</p>' : '';
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Hasil Seleksi - ' . $periodeName . '</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { text-align: center; color: #333; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #4CAF50; color: white; }
                tr:nth-child(even) { background-color: #f2f2f2; }
                .lulus { color: green; font-weight: bold; }
                .tidak-lulus { color: red; font-weight: bold; }
            </style>
        </head>
        <body>
            <h1>Hasil Seleksi Siswa Baru</h1>
            ' . $periodeInfo . '
            <p><strong>Tanggal Cetak:</strong> ' . date('d F Y') . '</p>
            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Rata-rata</th>
                        <th>Poin Prestasi</th>
                        <th>Nilai Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';
        
        $no = 1;
        foreach ($pendaftar as $user) {
            $statusClass = $user->status_seleksi === 'Lulus' ? 'lulus' : 'tidak-lulus';
            
            $html .= '
                    <tr>
                        <td>' . $no++ . '</td>
                        <td>' . ($user->nama_pendaftar ?? '-') . '</td>
                        <td>' . ($user->nisn_pendaftar ?? '-') . '</td>
                        <td>' . $user->avg . '</td>
                        <td>+' . $user->poin_prestasi . '</td>
                        <td><strong>' . $user->nilai_total . '</strong></td>
                        <td class="' . $statusClass . '">' . $user->status_seleksi . '</td>
                    </tr>';
        }
        
        $html .= '
                </tbody>
            </table>
        </body>
        </html>';
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'inline; filename="hasil_seleksi_' . date('Y-m-d') . '.html"');
    }

    /**
     * Reset hasil seleksi berdasarkan periode
     */
    public function resetSeleksi(Request $request)
    {
        $periodeId = $request->input('periode_id');
        
        if ($periodeId) {
            DB::table('seleksis')->where('periode_id', $periodeId)->delete();
            
            User::where('role', 'PENDAFTAR')
                ->where('periode_id', $periodeId)
                ->update(['status_seleksi' => 'Belum Diseleksi']);
                
            return redirect()->back()->with('success', 'Hasil seleksi periode berhasil direset.');
        }
        
        return redirect()->back()->with('error', 'Pilih periode terlebih dahulu.');
    }
}