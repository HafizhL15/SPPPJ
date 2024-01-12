@extends('layouts.admin')
@section('title','Daftar Laporan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center fw-bold"> Daftar Laporan</h1><br>
    {{-- <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pesanan Baru</a> --}}
    {{-- <button href="{{ url('/download-pemesanan') }}" class="btn btn-primary mb-2">Download Laporan</button> --}}
    <div class="col-md-6 col-lg-6 ">
        {{-- <h3 class="fw-bold">Data Rekrutmen</h3> --}}
        <table class="table fw-bold " style="font-size: 16px">
          <thead>
            <tr>
                <td >Laporan Pemesanan</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-pemesanan') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
            <tr>
                <td >Laporan Pembayaran</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-pembayaran') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
            <tr>
                <td >Laporan Barang Produk</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-barang') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
            <tr>
                <td >Laporan Service Barang</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-service') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
            <tr>
                <td >Laporan Kuesioner Kepuasan Pelanggan</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-kuesioner') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
            <tr>
                <td >Laporan Kritik dan Saran</td>
                <td >:</td>
                <td><a href="{{ url('/laporan-feedback') }}" class="btn btn-primary mb-2 btn-sm">Download Laporan</a></td>
            </tr>
          </thead>
        </table>
    </div>

@endsection
