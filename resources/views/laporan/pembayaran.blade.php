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
    <h1 style="text-align: center">Laporan Pembayaran</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Pemesanan</th>
                <th>Kode Bayar</th>
                <th>Total Harga</th>
                <th>Bukti Pembayaran</th>
                
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($data as $item)
                @php
                    $total = ($item->jumlah_harga) + ($item->kode)   
                @endphp
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama_pesanan }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->kode }}</td>                    
                    <td>Rp. {{ number_format($total) }}</td>
                    <td><img src="{{ asset('/storage/pembayaran/'.$item->bukti_pembayaran) }}" width="200px" height="200px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

