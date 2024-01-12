@extends('layouts.admin')
@section('title','Edit Pembayaran')
@section('main-content')
    <!-- Page Heading -->
    <h1>Edit Pembayaran</h1>
    
    <form action="{{ route('pembayaran.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="id_pembayaran">ID Pembayaran</label>
            <input type="text" name="id_pembayaran" value="{{ old('id_pembayaran', $pembayaran->id_pembayaran) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="id_pesanan">ID Pesanan</label>
            <input type="text" name="id_pesanan" value="{{ old('id_pesanan', $pembayaran->id_pesanan) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
            <input type="text" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran', $pembayaran->jumlah_pembayaran) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}" class="form-control" required> 
        </div>
        <div class="form-group mb-3">
            <label for="bukti_pembayaran">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" value="{{ old('bukti_pembayaran', $pembayaran->bukti_pembayaran) }}" class="form-control" required>
        </div>        
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>

@endsection
