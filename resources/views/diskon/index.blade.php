@extends('layouts.admin')
@section('title','Daftar Diskon')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Diskon</h1>
    <a href="{{ route('admin-diskon.create') }}" class="btn btn-primary">Tambah Kode Diskon Baru</a>
    <br><br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>No</th>
                <th>Kode Diskon</th>
                <th>Jumlah Diskon</th>
                <th>Tanggal Dibuat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($diskon as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->kode_diskon }}</td> 
                    <td>Rp. {{ number_format($item->diskon) }}</td>
                    <td>{{ $item->tanggal_akhir }}</td>
                    <td>  
                        <form action="{{ route('admin-diskon.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data tersebut ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
