@extends('layouts.admin')
@section('title','Tambah Pembayaran')
@section('main-content')
    <!-- Page Heading -->
    <h1>Tambah Pembayaran Baru</h1>
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="id_pembayaran">ID Pembayaran</label>
            <input type="text" name="id_pembayaran" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="id_pesanan">ID Pesanan</label>
            <input type="text" name="id_pesanan" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
            <input type="text" name="jumlah_pembayaran" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" required> 
        </div>
        <div class="form-group mb-3">
            <label for="bukti_pembayaran">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran"  class="form-control" required>
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
