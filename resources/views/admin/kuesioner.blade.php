@extends('layouts.admin')
@section('title','Daftar Kuesioner')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Kuesioner</h1>
    {{-- <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pesanan Baru</a> --}}
    <br><br>
    <div class="col-md-12 " >
        <div class="card mt-2">
            <div class="card-body fw-bold">
                <div class="table-responsive">
                    <table class="table">
                    
                        <tbody >
                            <tr>
                                <td>Pertanyaan 1 : </td>
                                <td>Bagaimana Pendapat Anda Tentang Layanan Kami Secara Keseluruhan?</td>
                            </tr>
                            <tr>
                                <td>Pertanyaan 2 : </td>
                                <td>Bagaimana Pengalaman Anda Dengan Proses Pemesanan dan Pengiriman Produk?</td>
                            </tr>
                            <tr>
                                <td>Pertanyaan 3 : </td>
                                <td>Sejauh Mana Anda Puas Dengan Layanan Service Kami?</td>
                            </tr>
                            <tr>
                                <td>Pertanyaan 4 : </td>
                                <td>Bagaimana Pendapat Anda Tentang Variasi Produk Yang Kami Sediakan?</td>
                            </tr>
                            <tr>
                                <td>Pertanyaan 5 : </td>
                                <td>Bagaimana Pendapat Anda Tentang Harga Produk Kami?</td>
                            </tr>
                        </tbody>
                        
                    </table>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-4">
        <thead >
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pertanyaan 1</th>
                <th>Pertanyaan 2</th>
                <th>Pertanyaan 3</th>
                <th>Pertanyaan 4</th>
                <th>Pertanyaan 5</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($kuesioner as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pertanyaan_1 }}</td>
                    <td>{{ $item->pertanyaan_2 }}</td>
                    <td>{{ $item->pertanyaan_3 }}</td>
                    <td>{{ $item->pertanyaan_4 }}</td>
                    <td>{{ $item->pertanyaan_5 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
