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
    <h1 style="text-align: center">Laporan Service</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Booking</th>
                <th>Tanggal Booking</th>
                <th>Nama Barang</th>
                <th>Status</th> 
                <th>Estimasi</th>
                <th>Biaya</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->kode_booking }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        @if($item->status == 0)
                        Menunggu Barang Diserahkan Ke Toko
                        @elseif($item->status == 1)
                        Barang Diterima
                        @elseif($item->status == 2)
                        Dalam Perbaikan
                        @elseif($item->status == 3)
                        Menunggu Spare Part
                        @elseif($item->status == 4)
                        Selesai 
                        @endif
                      </td>
                    <td>{{ $item->estimasi }} Hari</td>
                    <td>Rp. {{ number_format($item->biaya) }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

