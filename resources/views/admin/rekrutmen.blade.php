@extends('layouts.admin')
@section('title','Daftar Rekrutmen')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Rekrutmen</h1>
    <br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>No. Handphone</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($rekrutmen as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a href="{{ url('admin-rekrutmen') }}/{{ $item->id }}" class="btn btn-success btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
