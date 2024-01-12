@extends('layouts.admin')
@section('title','Edit Pemesanan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Edit Pesanan</h1>
    <br>
    <table class="table table-bordered" style="font-size: 16px">
        <thead >
            <tr>
                <th>Nama</th>
                <th>Tanggal Pemesanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pemesanan->fullname }}</td>
                <td>{{ $pemesanan->tanggal }}</td>
                <td>Rp. {{ number_format($pemesanan->jumlah_harga) }}</td>
                <td>
                    @if($pemesanan->status == 1)
                    Menunggu Pembayaran
                    @elseif($pemesanan->status == 2)
                    Menunggu Verifikasi
                    @elseif($pemesanan->status == 3)
                    Pesanan Diproses
                    @elseif($pemesanan->status == 4)
                    Pesanan Dikirim
                    @else
                        
                    @endif
                </td>
                <td ><img src="{{ asset('/storage/pembayaran/'.$pemesanan->bukti_pembayaran) }}" width="200px" height="200px" alt="..."></td>
            </tr>
        </tbody>
    </table>

    <div class="col-md-6 " >
        <div class="card mt-2">
            <div class="card-body fw-bold">
                <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="status" style="font-size: 20px">Status Pesanan Saat Ini : 
                            @if($pemesanan->status == 1)
                            Menunggu Pembayaran
                            @elseif($pemesanan->status == 2)
                            Menunggu Verifikasi
                            @elseif($pemesanan->status == 3)
                            Pesanan Diproses
                            @elseif($pemesanan->status == 4)
                            Pesanan Dikirim
                            @else
                            @endif
                        </label><br>
                        <select class="form-select" name="status" required >
                            {{-- <option value="1">Menunggu Pembayaran</option>
                            <option value="2">Menunggu Verifikasi</option> --}}
                            <option value="3">Pesanan Diproses</option>
                            <option value="4">Pesanan Dikirim</option>
                        </select>
                        @if(session('error'))
                            <p class="mx-5 fw-bold" style="color: red;">{{ session('error') }}</p>
                        @endif
                    </div>

                    <div class="form-group d-flex justify-content">
                        <button type="submit" class="btn btn-success" >Update</button>                        
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection
