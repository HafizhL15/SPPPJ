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
    <h1 style="text-align: center">Laporan Kuesioner</h1>
    <table>
                    
        <tbody >
            <tr>
                <td>Pertanyaan 1 : </td>
                <td>Bagaimana Pendapat Anda Tentang Layanan Kami Secara Keseluruhan?</td>
            </tr>
            <tr>
                <td>Pertanyaan 2 : </td>
                <td>Bagaimana Pengalaman Anda Dengan Proses Pemesanan dan Pengiriman Produk?</td>
            </tr>
            <tr>
                <td>Pertanyaan 3 : </td>
                <td>Sejauh Mana Anda Puas Dengan Layanan Service Kami?</td>
            </tr>
            <tr>
                <td>Pertanyaan 4 : </td>
                <td>Bagaimana Pendapat Anda Tentang Variasi Produk Yang Kami Sediakan?</td>
            </tr>
            <tr>
                <td>Pertanyaan 5 : </td>
                <td>Bagaimana Pendapat Anda Tentang Harga Produk Kami?</td>
            </tr>
        </tbody>
        
    </table>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Pertanyaan 1</th>
                <th>Pertanyaan 2</th>
                <th>Pertanyaan 3</th>
                <th>Pertanyaan 4</th>
                <th>Pertanyaan 5</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pertanyaan_1 }}</td>
                    <td>{{ $item->pertanyaan_2 }}</td>
                    <td>{{ $item->pertanyaan_3 }}</td>
                    <td>{{ $item->pertanyaan_4 }}</td>
                    <td>{{ $item->pertanyaan_5 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

