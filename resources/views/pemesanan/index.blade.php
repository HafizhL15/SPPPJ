@extends('layouts.admin')
@section('title','Daftar Pemesanan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Daftar Pesanan</h1>
    {{-- <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">Tambah Pesanan Baru</a> --}}
    <button href="{{ url('/download-pdf') }}" class="btn btn-primary mb-2">Download Laporan</button>
    <table class="table table-bordered">
        <thead >
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Tanggal Pemesanan</th>
                {{-- <th>Jumlah Barang</th> --}}
                <th>Total Harga</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $increment = 1;
            @endphp
            @foreach ($pesanan as $item)
                <tr>
                    <td>{{ $increment++ }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>Rp. {{ number_format($item->jumlah_harga) }}</td>
                    <td>
                        @if($item->status == 1)
                        Menunggu Pembayaran
                        @elseif($item->status == 2)
                        Menunggu Verifikasi
                        @elseif($item->status == 3)
                        Pesanan Diproses
                        @elseif($item->status == 4)
                        Pesanan Dikirim
                        @else
                        @endif
                      </td>
                    <td>
                        <a href="{{ route('pemesanan.edit', $item->id) }}"  class="btn btn-warning mb-2">Edit Pesanan</a><br>
                        <a href="{{ url('daftar-pesanan') }}/{{ $item->id }}" class="btn btn-success">Lihat Pesanan</a><br>
                        
                        {{-- <form action="{{ route('pemesanan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data tersebut ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
