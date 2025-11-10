<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard PDF - {{ $user->nama_pendaftar }}</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .container {
            padding: 25px;
        }
        .kop {
            text-align: center;
            margin-bottom: 15px;
        }
        .kop img {
            width: 90px;
            display: block;
            margin: 0 auto 5px;
        }
        .kop h1 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 10px;
            border-bottom: 1px solid #aaa;
            padding-bottom: 3px;
            color: #222;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }
        th, td {
            padding: 8px 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .no-border {
            border: none;
        }
        img.pas-foto {
            width: 80px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ccc;
            padding: 2px;
            border-radius: 3px;
        }
        hr {
            border: none;
            border-top: 2px solid #444;
            margin: 15px 0 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            color: #555;
            margin-top: 25px;
        }
        .peraturan {
            font-size: 12px;
            margin-bottom: 20px;
        }
        .signatures {
            width: 100%;
            margin-top: 30px;
            text-align: center;
        }
        .sign-box {
            width: 30%;
            display: inline-block;
            margin: 0 3%;
        }
        .sign-space {
            height: 70px;
        }
        .sign-name {
            border-top: 1px solid #000;
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    
    <!-- Kop Surat -->
    <table style="width:100%; margin-bottom:20px;">
        <tr>
            <td style="text-align:center;">
                <h1 style="margin:0;">Veritas School</h1>
                <p style="margin:2px 0; font-size:12px;">Alamat : Jalan Adisucipto No.38, Kerten, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57143</p>
                <p style="margin:2px 0; font-size:12px;">Telp: 0271-726036 / Fax: 740932</p>
            </td>
            <td style="width:120px; text-align:right;">
                <img src="{{ public_path('image/icon/icon-with-text.png') }}" alt="Logo Veritas" style="width:100px;">
            </td>
        </tr>
    </table>
    <hr>

    <!-- Status -->
    <div>
        <div class="section-title">Status Pendaftaran & Seleksi</div>
        <table>
            <tr>
                <th>Status Pendaftaran</th>
                <th>Status Seleksi</th>
            </tr>
            <tr>
                <td>{{ ucfirst($user->status) }}</td>
                <td>{{ $user->status_seleksi }}</td>
            </tr>
        </table>
    </div>

    <!-- Data Pendaftar -->
    <div>
        <div class="section-title">Data Pendaftar</div>
        <table>
            <tr><th>Nama Lengkap</th><td>{{ $user->nama_pendaftar ?? '-' }}</td></tr>
            <tr><th>NISN</th><td>{{ $user->nisn_pendaftar ?? '-' }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $user->tanggallahir_pendaftar ?? '-' }}</td></tr>
            <tr><th>Agama</th><td>{{ $user->agama ?? '-' }}</td></tr>
            <tr><th>Alamat</th><td>{{ $user->alamat_pendaftar ?? '-' }}</td></tr>
            <tr><th>Nama Orang Tua</th><td>{{ $user->nama_ortu ?? '-' }}</td></tr>
            <tr><th>Pekerjaan Orang Tua</th><td>{{ $user->pekerjaan_ortu ?? '-' }}</td></tr>
            <tr><th>Nomor HP Orang Tua</th><td>{{ $user->no_hp_ortu ?? '-' }}</td></tr>
        </table>
    </div>

    <!-- Berkas -->
    <div>
        <div class="section-title">Berkas yang Diupload</div>
        @if($berkas)
        <table>
            <tr><th>Ijazah / SKHUN</th><td>{{ $berkas->ijazah_skhun ?? '-' }}</td></tr>
            <tr><th>Akta Kelahiran</th><td>{{ $berkas->akta_kelahiran ?? '-' }}</td></tr>
            <tr><th>Kartu Keluarga</th><td>{{ $berkas->kk ?? '-' }}</td></tr>
            <tr>
                <th>Pas Foto</th>
                <td>
                    @if($berkas->pas_foto)
                        <img src="{{ public_path('storage/' . $berkas->pas_foto) }}" class="pas-foto">
                    @else
                        -
                    @endif
                </td>
            </tr>
        </table>
        @else
            <p>Belum ada berkas yang diupload.</p>
        @endif
    </div>

    <!-- Prestasi -->
    <div>
        <div class="section-title">Prestasi yang Diupload</div>
        @if($prestasis->count() > 0)
        <table>
            <tr><th>Nama Prestasi</th><th>Tingkat</th><th>Tahun</th></tr>
            @foreach($prestasis as $prestasi)
            <tr>
                <td>{{ $prestasi->nama_prestasi }}</td>
                <td>{{ $prestasi->tingkat }}</td>
                <td>{{ $prestasi->tahun ?? '-' }}</td>
            </tr>
            @endforeach
        </table>
        @else
            <p>Belum ada prestasi yang diupload.</p>
        @endif
    </div>

    <!-- Nilai Rapor -->
    <div>
        <div class="section-title">Nilai Rapor</div>
        <table>
            <tr><th>Semester</th><th>Nilai</th></tr>
            @php
                $total = 0;
                $count = 0;
            @endphp
            @for($i=1; $i<=5; $i++)
                @php
                    $nilai = $user->{'nilai_smt'.$i} ?? 0;
                    $total += $nilai;
                    $count++;
                @endphp
            <tr>
                <td>Semester {{ $i }}</td>
                <td>{{ $nilai ?: '-' }}</td>
            </tr>
            @endfor
            <tr>
                <th>Rata-rata</th>
                <th>{{ $count > 0 ? number_format($total/$count, 2) : '-' }}</th>
            </tr>
        </table>
    </div>

    <!-- Persyaratan & Peraturan -->
    <div>
        <div class="section-title">Persyaratan & Peraturan Sekolah</div>
        <div class="peraturan">
            <ol>
                <li>Calon siswa wajib membayar uang awal sebesar <strong>Rp500.000</strong> pada saat diterima.</li>
                <li>SPP setiap bulan sebesar <strong>Rp200.000</strong> dibayarkan tepat waktu sesuai jadwal sekolah.</li>
                <li>Seluruh siswa wajib mematuhi peraturan sekolah yang berlaku.</li>
                <li>Siswa harus hadir tepat waktu dan menjaga kedisiplinan.</li>
                <li>Orang tua harus mendukung proses pendidikan anak dan komunikasi dengan sekolah.</li>
            </ol>
        </div>
    </div>

    <!-- Tanda Tangan -->
    <div class="section-title">Tanda Tangan</div>
    <div class="signatures">
        <div class="sign-box">
            <div>Orang Tua / Wali</div>
            <div class="sign-space"></div>
            <div class="sign-name">{{ $user->nama_ortu ?? '-' }}</div>
        </div>
        <div class="sign-box">
            <div>Pendaftar</div>
            <div class="sign-space"></div>
            <div class="sign-name">{{ $user->nama_pendaftar ?? '-' }}</div>
        </div>
        <div class="sign-box">
            <div>Admin</div>
            <div class="sign-space"></div>
            <div class="sign-name">__________________</div>
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Veritas School. Semua hak cipta dilindungi.
    </div>

</div>
</body>
</html>
