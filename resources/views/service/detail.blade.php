@extends('layouts.front')
@section('title','Detail Service')
@section('content')

  <!-- banner -->
  <div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h2 class="text-light text-center mb-3">Servie Barang Rusakmu Sekarang</h2>
    </div>
  </div>

  <!-- Service Detail -->
  <div class="container-fluid py-4">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Detail Service</h2>
      <div class="row">
          <!-- image produk -->
          <div class="col-md-6 col-lg-4 mb-3">
            <img src="{{ asset('/storage/barang_service/'.$service->gambar_barang) }}" class="img-fluid">
          </div>
          <!-- detail -->
          <div class="col-md-6 mt-1 col-lg-8">
            {{-- <h3 class="fw-bold">{{ $produk->nama_produk }}</h3> --}}
            <table class="table fw-bold">
              <tbody>
                <tr>
                  <td>Nama Pelanggan</td>
                  <td>:</td>
                  <td>{{ $service->nama_pelanggan }}</td>
                </tr>
                <tr>
                  <td>Nama Barang</td>
                  <td>:</td>
                  <td>{{ $service->nama_barang }}</td>
                </tr>
                <tr>
                  <td>Kode Service</td>
                  <td>:</td>
                  <td>{{ $service->kode_booking }}</td>
                </tr>
                <tr>
                  <td>Tanggal Service</td>
                  <td>:</td>
                  <td>{{ $service->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <td>Kerusakan</td>
                    <td>:</td>
                    <td>{{ $service->keterangan}}</td>
                </tr>
                <tr>
                  <td>Status Service</td>
                  <td>:</td>
                  <td>
                    @if($service->status == 0)
                    Menunggu Barang Diserahkan Ke Toko
                    @elseif($service->status == 1)
                    Barang Diterima
                    @elseif($service->status == 2)
                    Dalam Perbaikan
                    @elseif($service->status == 3)
                    Menunggu Spare Part
                    @elseif($service->status == 4)
                    Selesai 
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Estimasi Perbaikan</td>
                  <td>:</td>
                  <td>{{ $service->estimasi }} Hari</td>
                </tr>
                <tr>
                  <td>Biaya</td>
                  <td>:</td>
                  <td>Rp. {{ number_format($service->biaya) }}</td>
                </tr>
                <tr>
                  <td>Catatan</td>
                  <td>:</td>
                  <td>{{ $service->catatan }}</td>
                </tr>
          
              </tbody>
          </table>

          </div>
      </div>
      
    </div>
  </div>

@endsection