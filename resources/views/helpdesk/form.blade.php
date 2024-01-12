@extends('layouts.front')
@section('title','Layanan Helpdesk')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
        <h2 class="text-light text-center mb-3">Butuh Bantuan ? Silahkan Ajukan Permasalahan Disini </h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-2 fw-bold">Form Bantuan</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        <form method="post" enctype="multipart/form-data" action="{{ url('helpdesk') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="permasalahan" class="col-sm-2 col-form-label">Permasalahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="permasalahan" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="10" required></textarea>
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