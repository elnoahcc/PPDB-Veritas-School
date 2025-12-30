<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hasil Seleksi Siswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .text-center {
            text-align: center;
        }
        .lulus {
            color: green;
            font-weight: bold;
        }
        .tidak-lulus {
            color: red;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>HASIL SELEKSI PENERIMAAN SISWA BARU</h1>
        <p>Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}</p>
        <p>Tanggal: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Lengkap</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Rata-rata</th>
                <th class="text-center">Poin Prestasi</th>
                <th class="text-center">Nilai Total</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $index => $user)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $user->nama_pendaftar ?? '-' }}</td>
                <td class="text-center">{{ $user->nisn_pendaftar ?? '-' }}</td>
                <td class="text-center">{{ $user->avg }}</td>
                <td class="text-center">+{{ $user->poin_prestasi }}</td>
                <td class="text-center"><strong>{{ $user->nilai_total }}</strong></td>
                <td class="text-center {{ $user->status_seleksi === 'Lulus' ? 'lulus' : 'tidak-lulus' }}">
                    {{ $user->status_seleksi }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
    </div>
</body>
</html>