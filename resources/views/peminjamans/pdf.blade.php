<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman Alat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
        }
        .subtitle {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Laporan Peminjaman Alat</div>
        <div class="subtitle">Tanggal: {{ now()->format('d F Y') }}</div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Alat</th>
                <th>Jumlah Dipinjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user->nama_peminjam ?? '-' }}</td>
                    <td>{{ $item->alat->nama_alat ?? '-' }}</td>
                    <td>{{ $item->jumlah_pinjam }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                    <td>
                        @if($item->tanggal_kembali)
                            {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        @if($item->status == 'Dikembalikan')
                            <span style="background-color: #d4edda; color: #155724; padding: 2px 6px; border-radius: 3px; font-size: 12px;">
                                Dikembalikan
                            </span>
                        @else
                            <span style="background-color: #fff3cd; color: #856404; padding: 2px 6px; border-radius: 3px; font-size: 12px;">
                                Dipinjam
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>