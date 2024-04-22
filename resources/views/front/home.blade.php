@extends('layouts.front')
@section('title','Raka Computer')
@section('content')

<!-- banner -->
<div class="container-fluid banner d-flex align-items-center">
  <div class="container">
      <h1 class="text-light text-center display-5">Selamat Datang </h1>
      <h1 class="text-light text-center display-5">Di Toko Raka Computer</h1>
  </div>
</div>

 <!-- Produk -->
 <div class="container-fluid py-5">
  <div class="container">
      <h2 class="text-center mb-5 fw-bold">Produk Kami</h2>
      <div class="row mt-5 justify-content-center">
        @foreach ($produk as $item)
          <div class="col-sm-6 col-lg-3 hovered-card mb-3">
              <div class="card" style="text-decoration: none">
                <img src="{{ asset('/storage/produk/'.$item->gambar) }}" class="card-img-top" style="height:200px; width:257px;">
                <div class="card-body text-center">
                  <a href="{{ url('produk-list') }}/{{ $item->id }}" style="text-decoration: none">
                  <h5 class="card-title text-success fw-bold">{{ $item->nama_produk }} </h5></a>
                  <h6 class="card-text ">{{ $item->kategori }}</h6>
                  <h5 class="text-success ">Rp. {{ number_format($item->harga_produk) }}</h5>
                </div>
              </div>
          </div>
        @endforeach  
      </div>
  </div>
</div>

<!-- Service -->
<div class="container-fluid py-5 main-color">
  <div class="container">
      <h2 class="text-light text-center mb-4">Kami Melayani</h2>

      <div class="row">
          <div class="col-lg-4">
              <div class="d-flex justify-content-center">
                  <div class="icon-service d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart display-6"></i>
                  </div>
              </div>
              <div class="mt-3 text-white text-center">
                      <h5>Penjualan Produk</h5>
                      <p>Berbagai Produk Terkini dan Terupdate</p>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="d-flex justify-content-center">
                  <div class="icon-service d-flex align-items-center justify-content-center">
                      <i class="bi bi-wrench display-6"></i>
                  </div>
              </div>
              <div class="mt-3 text-white text-center">
                      <h5>Layanan Service</h5>
                      <p>Layanan Perbaikan Barang Bergaransi</p>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="d-flex justify-content-center">
                  <div class="icon-service d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat display-6"></i>
                  </div>
              </div>
              <div class="mt-3 text-white text-center">
                      <h5>Layanan Konsultasi</h5>
                      <p>Konsultasikan Kebutuhanmu Disini</p>
              </div>
          </div>
      </div>
  </div>

</div>

@endsection
