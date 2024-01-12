@extends('layouts.admin')
@section('title','Daftar Pengguna')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Pengguna</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Pengguna</a>
    <br><br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Otorisasi</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($user as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>{{ $item->roleuser->role }}</td>
                    <td>  
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                        <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a><button type="submit" onclick="return confirm('Anda yakin ingin menghapus data tersebut ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection