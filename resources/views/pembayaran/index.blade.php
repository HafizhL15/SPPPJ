@extends('layouts.admin')
@section('title','Daftar Pemesanan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Pembayaran</h1>
    {{-- <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pesanan Baru</a> --}}
    <br><br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>NO</th>
                <th>Nama</th>
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
            @foreach ($pesanan as $item)
                @php
                    $total = ($item->jumlah_harga) + ($item->kode)   
                @endphp
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>Rp {{ number_format($total) }}</td>
                    <td><img src="{{ asset('/storage/pembayaran/'.$item->bukti_pembayaran) }}" width="200px" height="200px"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

{{-- @extends('layouts.admin')
@section('title','Daftar Produk')

@if (session()->has('berhasil'))
<div class="alert alert-succes" role="alert" style="font-weight: bold">
    {{ session()->get('berhasil') }}
</div>
@endif

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Produk</h1><br>
    <a href="{{ route('produk.create') }}" type="button" class="btn btn-dark my-2"><i class="fa fa-plus"></i>Tambah Data</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Kode Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp --}}
            {{-- @foreach ($produk as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td><img src="{{ asset('/asset/img/'.$item->gambar) }}" style="width: 70px; height:70px"></td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->stok_produk }}</td>
                    <td>{{ $item->harga_produk }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->deskripsi_produk }}</td>
                    <td>  
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a><br>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data tersebut ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        {{-- </tbody>
    </table>
@endsection
 --}}
