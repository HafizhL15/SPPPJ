@extends('layouts.front')
@section('title','Detail Produk')
@section('content')

  <!-- banner -->
  <div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h2 class="text-light text-center mb-3">Pilih Produk Suka Suka Kamu</h2>
    </div>
  </div>

  <!-- Produk Detail -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            {{-- <img src="{{ url('images/logo.png') }}" class="rounded mx-auto d-block" width="700" alt=""> --}}
        </div>
        @foreach($barangs as $barang)
        <div class="col-md-4">
            <div class="card">
              <img src="{{ asset('/storage/produk/'.$barang->gambar) }}" class="card-img-top" >
              <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_produk }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($barang->harga_produk)}} <br>
                    <strong>Stok :</strong> {{ $barang->stok_produk }} <br>
                    <hr>
                    <strong>Keterangan :</strong> <br>
                    {{ $barang->deskripsi_produk }} 
                </p>
                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
              </div>
            </div> 
        </div>
        @endforeach
    </div>
</div> 

@endsection