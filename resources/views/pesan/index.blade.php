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
      <h2 class="text-center fw-bold mb-5">Detail Produk</h2>
      <div class="row">
          <!-- image produk -->
          <div class="col-md-6 col-lg-4 mb-3">
            <img src="{{ asset('/storage/produk/'.$produk->gambar) }}" class="img-fluid">
          </div>
          <!-- detail -->
          <div class="col-md-6 mt-1 col-lg-8">
            <h3 class="fw-bold">{{ $produk->nama_produk }}</h3>
            <table class="table fw-bold">
              <tbody>
                  <tr>
                      <td>Harga</td>
                      <td>:</td>
                      <td>Rp. {{ number_format($produk->harga_produk) }}</td>
                  </tr>
                  <tr>
                      <td>Stok</td>
                      <td>:</td>
                      <td>{{ number_format($produk->stok_produk) }}</td>
                  </tr>
                  <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td >{{ $produk->kategori }}</td>
                 </tr>
                  <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td style="text-align: justify">{{ $produk->deskripsi_produk }}</td>
                  </tr>
                  <tr>
                      <td>Jumlah Pesan</td>
                      <td>:</td>
                      <td>
                          <form method="post" action="{{ url('pesan') }}/{{ $produk->id }}" >
                          @csrf
                              <input class="col-auto" type="text" name="jumlah_pesan" class="form-control" required>
                              <button type="submit" class="btn btn-primary ms-3"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      @if(session('error'))
                      <p class="mx-5 fw-bold" style="color: red;">{{ session('error') }}</p>
                      @endif
                    </td>
                  </tr>
                  
                  
              </tbody>
            </table>
          </div>
      </div>
      
    </div>
  </div>

 
@endsection