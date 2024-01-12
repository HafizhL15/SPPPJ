@extends('layouts.front')
@section('title','Rekrutmen Pegawai')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h2 class="text-light text-center mb-3">Daftarkan Dirimu Sebagai Bagian</h2>
      <h2 class="text-light text-center mb-3">Dari Raka Computer</h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-4 fw-bold">Form Rekrutmen</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        <form method="post" enctype="multipart/form-data" action="{{ url('rekrutmen') }}" >
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nik" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>     
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">No Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_telepon" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Status Pernikahan</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>Pilih Status</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option> 
                                        <option value="Cerai">Cerai</option>     
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Resume CV</label>
                                <div class="col-sm-10">
                                <input type="file" class="form-control" name="resume" accept=".pdf, .doc, .docx" required>
                                </div>
                            </div>
                            <div>
                                <h5>Dengan ini saya menyatakan bahwa data diatas adalah data sebenarnya dan saya siap bertanggung jawab atas kesalahan data tersebut</h5>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">Saya Setuju</label>
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