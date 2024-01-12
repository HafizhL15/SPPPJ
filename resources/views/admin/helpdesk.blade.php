@extends('layouts.admin')
@section('title','Daftar Bantuan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Bantuan</h1>
    <br><br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Permasalahan</th>
                <th>Keterangan</th>
                <th>Komentar</th>
                @if (Auth::check() && Auth::user()->role_id === 2)
                <th>Opsi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($helpdesks as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        @if($item->status == 0)
                        Menunggu Balasan
                        @elseif($item->status == 1)
                        Selesai
                        @endif
                    </td>
                    <td>{{ $item->permasalahan}}</td>
                    <td>{{ $item->keterangan}}</td>
                    <td>{{ $item->komentar}}</td>
                    @if (Auth::check() && Auth::user()->role_id === 2)
                    <td>  
                        <a href="{{ route('admin_helpdesk.edit', $item->id) }}" class="btn btn-warning">Edit Data</a><br>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
