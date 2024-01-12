@extends('layouts.admin')
@section('title','Tambah Service')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center fw-bold">Tambah Service Baru</h1>
    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required> 
        </div>
        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="gambar_barang">Gambar Barang</label>
            <input type="file" name="gambar_barang"  class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="estimasi">Estimasi Perbaikan</label>
            <input type="text" name="estimasi" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="biaya">Biaya</label>
            <input type="number" name="biaya" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="catatan">Catatan</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="catatan" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('service.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
