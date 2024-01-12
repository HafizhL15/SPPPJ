@extends('layouts.front')
@section('title','Raka Computer')
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
        <div class="list-group fw-bold">
          <a href="{{ route('show', 'laptop') }}" class="list-group-item list-group-item-action">Laptop</a>
          <a href="{{ route('show', 'monitor') }}" class="list-group-item list-group-item-action">Monitor</a>
          <a href="{{ route('show', 'printer') }}" class="list-group-item list-group-item-action">Printer</a>
          <a href="{{ route('show', 'accessories') }}" class="list-group-item list-group-item-action">Accessories</a>
          <a href="{{ route('show', 'audio') }}" class="list-group-item list-group-item-action">Audio</a>
          <a href="{{ route('show', 'input-devices') }}" class="list-group-item list-group-item-action">Input Devices</a>
          <a href="{{ route('show', 'spareparts') }}" class="list-group-item list-group-item-action">Spare Parts</a>
        </div>
      </div>
      <!-- Produk -->
      <div class="col-md-8 col-lg-9">
        <h4 class="text-center fw-bold mb-4">Semua Produk</h4>
        <div class="row">
          @foreach ($barang as $item)
          <div class="col-sm-6 col-lg-4 mb-3">
            <div class="card" >
              <img src="{{ asset('/storage/produk/'.$item->gambar) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-center text-success"><strong>{{ $item->nama_produk }}</strong> </h5>
                <h6 class="text-center text-black">{{ $item->kategori }}</h6>
                <h6 class="text-center text-black">{{ $item->stok_produk }}</h6>
                <h5 class="text-center text-success">Rp. {{ number_format($item->harga_produk) }}</h5>
                <a href="/pesan/{{$item->id}}" class="btn btn-outline-success text-center w-100">Selengkapnya</a>
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
