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
    <h1 style="text-align: center">Laporan Barang</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td><img src="{{ asset('/storage/produk/'.$item->gambar) }}" style="width: 70px; height:70px"></td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->stok_produk }}</td>
                    <td>Rp. {{ number_format($item->harga_produk) }}</td>
                    <td>{{ $item->kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>