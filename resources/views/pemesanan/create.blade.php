@extends('layouts.admin')
@section('title','Tambah Pesanan')
@section('main-content')
    <!-- Page Heading -->
    <h1>Tambah Pesanan Baru</h1>
    <form action="{{ route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-group mb-3">
            <label for="user_id">ID User</label>
            <input type="text" name="user_id" class="form-control" value=>
        </div> --}}
        <div class="form-group mb-3">
            <label for="produk_id">ID Produk</label>
            <input type="text" name="produk_id" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="number" name="jumlah_barang" class="form-control" required>
        
        </div>
        <div class="form-group mb-3">
            <label for="total_harga">Total Harga</label>
            <input type="number" name="total_harga" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_pesanan">Tanggal Pemesanan</label>
            <input type="date" name="tanggal_pesanan"  class="form-control" required>  
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2">Submit</button>
            <br>
            <a href="{{ route('pemesanan.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
