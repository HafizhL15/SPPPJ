@extends('layouts.admin')
@section('title','Daftar Service')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center ">Daftar Service</h1>
    <a href="{{ route('service.create') }}" class="btn btn-primary">Booking Service</a>
    <br><br>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Gambar Barang</th>
                <th>Kode Booking</th>
                <th>Tanggal Booking</th>
                <th>Nama Barang</th>
                <th>Status</th>              
                <th>Estimasi</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($service as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td><img src="{{ asset('/storage/barang_service/'.$item->gambar_barang) }}" style="width: 70px; height:70px"></td>
                    <td>{{ $item->kode_booking }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>
                        @if($item->status == 0)
                        Menunggu Barang Service
                        @elseif($item->status == 1)
                        Barang Diterima
                        @elseif($item->status == 2)
                        Dalam Perbaikan
                        @elseif($item->status == 3)
                        Menunggu Spare Part
                        @elseif($item->status == 4)
                        Selesai 
                        @endif
                      </td>
                    <td>{{ $item->estimasi }}</td>
                    <td>  
                        <a href="{{ route('service.edit', $item->id) }}" class="btn btn-warning">Edit Data</a><br>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
