@extends('layouts.front')
@section('title','Kritik Saran')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
        <h2 class="text-light text-center mb-3">Kritik dan Saran Yang Anda Berikan </h2>
        <h2 class="text-light text-center mb-3">Sangat Berarti Bagi Kami</h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-4 fw-bold">Form Kritik Dan Saran</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        <form method="post" enctype="multipart/form-data" action="{{ url('feedback') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Kritik Dan Saran</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="kritik_saran" id="" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-success margin-auto" align="center">Kirim</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection