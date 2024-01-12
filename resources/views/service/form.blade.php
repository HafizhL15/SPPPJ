@extends('layouts.front')
@section('title','Booking Service')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h2 class="text-light text-center mb-3">Service Barang Rusakmu Sekarang</h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-4 fw-bold">Booking Service</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        <form method="post" enctype="multipart/form-data" action="{{ url('booking_service') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="nama_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_pelanggan" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_barang" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Tanggal Booking</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_masuk" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Deskripsi Kerusakan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Gambar Barang</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="gambar_barang" accept="image/*" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success margin-auto" align="center">Booking</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection