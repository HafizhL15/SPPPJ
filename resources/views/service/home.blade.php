@extends('layouts.front')
@section('title','Daftar Service')
@section('content')

<body>
  <!-- Tabel -->
  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mt-4 mb-3 fw-bold">Daftar Service</h2>

      <div class="table-responsive">
        <table class="table" style="font-size: 18px">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar Barang</th>
              <th>Kode Booking</th>
              <th>Tanggal Booking</th>
              <th>Nama Barang</th>
              <th>Status</th>              
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($services as $service)
            <tr>
                <td>{{ $no++ }}</td>
                <td><img src="{{ asset('/storage/barang_service/'.$service->gambar_barang) }}" width="150px" alt="..."></td>
                <td>{{ $service->kode_booking }}</td>
                <td>{{ $service->tanggal_masuk }}</td>
                <td>{{ $service->nama_barang }}</td>
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
                <td>
                  <a href="{{ url('riwayat-service') }}/{{ $service->id }}" class="btn btn-success btn-sm">Detail</a>
                </td>
                
            </tr>
            @endforeach
          </tbody>
          
        </table>
        <br><br><br><br><br><br><br><br><br>
      </div>
    </div>

  </div>
  
@endsection