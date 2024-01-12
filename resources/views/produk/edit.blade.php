@extends('layouts.admin')
@section('title','Edit Produk')
@section('main-content')
    <!-- Page Heading -->
    <h1>Edit Produk</h1>
    
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}" class="form-control" required>
        
        </div>
        <div class="form-group mb-3">
            <label for="stok_produk">Stok</label>
            <input type="text" name="stok_produk" value="{{ old('stok_produk', $produk->stok_produk) }}" class="form-control" required>
            
        </div>
        <div class="form-group mb-3">
            <label for="harga_produk">Harga</label>
            <input type="number" name="harga_produk" value="{{ old('harga_produk', $produk->harga_produk) }}" class="form-control" required>
        </div>

        
        <div class="form-group mb-3">
            <label for="deskripsi_produk">Deskripsi</label>
            <div class="col-sm-12">
                <textarea class="form-control" name="deskripsi_produk" id="" cols="30" rows="5" value="{{ old('deskripsi_produk', $produk->deskripsi_produk) }}" required></textarea>
            </div>
            {{-- <input type="text" name="deskripsi_produk" value="{{ old('deskripsi_produk', $produk->deskripsi_produk) }}" class="form-control" required> --}}
        </div>
        <div class="form-group mb-3">
            <label for="gambar">Gambar Produk</label>
            <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control" >
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('produk.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>

@endsection
