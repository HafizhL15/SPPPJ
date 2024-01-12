<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Optional: Hover effect */
        tr:hover {
            background-color: #e5e5e5;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Laporan Pemesanan</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Tanggal Pemesanan</th>
                <th>Jenis Pesanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Alamat</th>
                
                
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($pesanan as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama_pesanan }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jenis_pesanan }}</td>
                    <td>Rp. {{ number_format($item->jumlah_harga) }}</td>
                    <td>
                        @if($item->status == 1)
                        Menunggu Pembayaran
                        @elseif($item->status == 2)
                        Menunggu Verifikasi
                        @elseif($item->status == 3)
                        Pesanan Diproses
                        @elseif($item->status == 4)
                        Pesanan Dikirim
                        @else
                        @endif
                    </td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

