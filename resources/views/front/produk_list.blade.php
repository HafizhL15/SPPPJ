@extends('layouts.front')
@section('title','Produk')
@section('content')

<!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
  <div class="container">
    <h2 class="text-light text-center mb-3">Pilih Produk Suka Suka Kamu</h2>
  </div>
</div>

<!-- Produk content -->
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">
      <!-- Kategori -->
      <div class="col-md-4 col-lg-3 mb-3">
        <h4 class="text-center fw-bold mb-4">Kategori</h4>
        <ul class="list-group fw-bold">
          <a href="{{ route('show', 'laptop') }}" style="text-decoration: none">
            <li class="list-group-item">Laptop</li>
          </a>
          <a href="{{ route('show', 'monitor') }}"  style="text-decoration: none">
            <li class="list-group-item">Monitor</li>
          </a>
          <a href="{{ route('show', 'printer') }}"  style="text-decoration: none">
            <li class="list-group-item">Printer</li>
          </a>
          <a href="{{ route('show', 'accessories') }}"  style="text-decoration: none">
            <li class="list-group-item">Accessories</li>
          </a>
          <a href="{{ route('show', 'audio') }}"  style="text-decoration: none">
            <li class="list-group-item">Audio</li>
          </a>
          <a href="{{ route('show', 'input-devices') }}"  style="text-decoration: none">
            <li class="list-group-item">Input Devices</li>
          </a>
          <a href="{{ route('show', 'spareparts') }}"  style="text-decoration: none">
            <li class="list-group-item">Sparepart</li>
          </a>
        </ul>
      </div>
      <!-- Produk -->
      <div class="col-md-8 col-lg-9">
        <h4 class="text-center fw-bold mb-4">Semua Produk</h4>
        <div class="row">
          @foreach ($produk as $item)
          <div class="col-sm-6 col-lg-4 mb-3">
            <div class="card" >
              <img src="{{ asset('/storage/produk/'.$item->gambar) }}" class="card-img-top" height="235px" width="257px">
              <div class="card-body">
                <h5 class="card-title text-center text-success"><strong>{{ $item->nama_produk }}</strong> </h5>
                <h6 class="text-center text-black">{{ $item->kategori }}</h6>
                <h6 class="text-center text-black">{{ $item->stok_produk }} Unit</h6>
                <h5 class="text-center text-success">Rp. {{ number_format($item->harga_produk) }}</h5>
                <a href="{{ url('produk-list') }}/{{ $item->id }}" class="btn btn-outline-success text-center w-100">Selengkapnya</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
