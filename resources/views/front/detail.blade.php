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
  <div class="container-fluid py-4">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Detail Produk AJA</h2>
      <div class="row">
          <!-- image produk -->
          <div class="col-lg-4 mb-3">
            <img src="{{ asset('/storage/produk/'.$produk->gambar) }}" class="img-fluid">
          </div>
          <!-- detail -->
          <div class="col-lg-8 margin">
            <h3>{{ $produk->nama_produk }}</h3>
            <h4>{{ $produk->stok_produk }}</h4>
            <h4>{{ $produk->kategori }}</h4>
            <h4 class="text-warning">{{ $produk->harga_produk }}</h4>
            <p> {!! {{ $produk->deskripsi_produk }} !!}</p>
            <form class="row g-3">
              <div class="col-auto">
                <form action="/transaksi/store" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- <label for="produk_id" type="hidden"></label><br>
                  <input type="hidden" id="produk_id" name="produk_id" required> --}}
                  {{-- <input type="hidden" id="produk_id" name="produk_id" value="{{$produk->id}}">
                  <input type="hidden" id="total_harga" name="total_harga" value="{{$produk->harga_produk}}">
                  <input type="number" class="form-control" placeholder="Banyak Barang" id="jumlah_barang" name="jumlah_barang" min="1" max="{{$produk->stok_produk}}">
                  <button type="submit" class="btn btn-outline-warning mb-4"> Pesan Sekarang </button> --}}

                  <div class="form-group mb-3">
                    <label for="produk_id">ID Produk</label>
                    <input type="text" name="produk_id" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
            
                    <div class="form-group mb-3">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" name="jumlah_barang" class="form-control" required>
                    
                    </div>
                    <div class="form-group mb-3">
                        <label for="total_harga">Total Harga</label>
                        <input type="number" name="total_harga" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_pesanan">Tanggal Pemesanan</label>
                        <input type="date" name="tanggal_pesanan"  class="form-control" required>  
                    </div>
                    <button type="submit" class="btn btn-success my-2">Pesan Sekarang</button>
                </form>
              </div>
          </div>
      </div>
      
    </div>
  </div>

  <!-- Reccomend Produk -->
  <div class="container-fluid py-5 mt-3 main-color" >
    <div class="container">
      <h3 class="text-center text-white fw-bold mb-4">Produk Lainnya</h3>
      <div class="row justify-content-center">
        @foreach ($barang as $item)
          <div class="col-6 col-sm-6 col-md-3 col-lg-2 mb-3">
            <a href="/detail/{{$item->id}}">
              <img src="{{ asset('/storage/produk/'.$item->gambar) }}" class="img-fluid" style="border: solid;">
            </a>
          </div>  
        @endforeach
        
      </div>
    </div>  

  </div>

@endsection