<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Berkas;
use App\Models\Prestasi; // ⬅️ Tambahan ini penting!

class PendaftarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $berkas = Berkas::where('user_id', $user->id)->first();
        return view('pendaftar.dashboard', compact('user', 'berkas'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nisn_pendaftar' => 'required|string|max:20',
            'nama_pendaftar' => 'required|string|max:50',
            'tanggallahir_pendaftar' => 'required|date',
            'alamat_pendaftar' => 'required|string',
            'agama' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:50',
            'pekerjaan_ortu' => 'required|string|max:50',
            'no_hp_ortu' => 'required|string|max:15',
            'alamat_ortu' => 'required|string',
            'nilai_smt1' => 'required|numeric',
            'nilai_smt2' => 'required|numeric',
            'nilai_smt3' => 'required|numeric',
            'nilai_smt4' => 'required|numeric',
            'nilai_smt5' => 'required|numeric',
        ]);

        $user->update($request->only([
            'nisn_pendaftar',
            'nama_pendaftar',
            'tanggallahir_pendaftar',
            'alamat_pendaftar',
            'agama',
            'nama_ortu',
            'pekerjaan_ortu',
            'no_hp_ortu',
            'alamat_ortu',
            'nilai_smt1',
            'nilai_smt2',
            'nilai_smt3',
            'nilai_smt4',
            'nilai_smt5',
        ]));

        return redirect()->route('pendaftar.dashboard')->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function uploadBerkas(Request $request)
    {
        $request->validate([
            'ijazah_skhun' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $berkas = Berkas::firstOrNew(['user_id' => $user->id]);

        $berkas->ijazah_skhun = $request->file('ijazah_skhun')->store('berkas', 'public');
        $berkas->akta_kelahiran = $request->file('akta_kelahiran')->store('berkas', 'public');
        $berkas->kk = $request->file('kk')->store('berkas', 'public');
        $berkas->pas_foto = $request->file('pas_foto')->store('berkas', 'public');

        $berkas->user_id = $user->id;
        $berkas->save();

        return redirect()->route('pendaftar.dashboard')->with('success', 'Semua berkas berhasil diupload.');
    }

    // ✅ Tambahkan ini di bawah
    public function uploadPrestasi(Request $request)
    {
        $request->validate([
            'nama_kejuaraan' => 'required|string|max:100',
            'tingkat' => 'required|in:Nasional,Provinsi,Kabupaten/Kota,Desa/Kelurahan',
            'foto_prestasi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $fotoPath = $request->file('foto_prestasi')->store('prestasi', 'public');

        Prestasi::create([
            'user_id' => $user->id,
            'nama_kejuaraan' => $request->nama_kejuaraan,
            'tingkat' => $request->tingkat,
            'foto_prestasi' => $fotoPath,
        ]);

        return redirect()->route('pendaftar.dashboard')->with('success', 'Prestasi berhasil diunggah!');
    }
}
