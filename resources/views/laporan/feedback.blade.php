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
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kritik & Saran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kritik_saran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

