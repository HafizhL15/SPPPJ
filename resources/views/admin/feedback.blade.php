@extends('layouts.admin')
@section('title','Daftar Kritik Saran')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center fw-bold">Daftar Kritik Saran</h1>

    <table class="table table-bordered mt-4">
        <thead >
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
            @foreach ($feedback as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kritik_saran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
