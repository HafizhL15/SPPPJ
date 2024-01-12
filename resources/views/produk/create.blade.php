@extends('layouts.admin')
@section('title','Tambah Produk')
@section('main-content')
    <!-- Page Heading -->
    <h1>Tambah Produk Baru</h1>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        
        </div>
        <div class="form-group mb-3">
            <label for="stok_produk">Stok</label>
            <input type="text" name="stok_produk" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="harga_produk">Harga</label>
            <input type="number" name="harga_produk" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="deskripsi_produk">Deskripsi</label>
            <div class="col-sm-12">
                <textarea class="form-control" name="deskripsi_produk" id="" cols="30" rows="5" required></textarea>
            </div>
            {{-- <input type="text" name="deskripsi_produk"  class="form-control" required>   --}}
        </div>
        <div class="form-group mb-3">
            <label for="gambar">Gambar Produk</label>
            <input type="file" name="gambar"  class="form-control" required>
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('produk.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
