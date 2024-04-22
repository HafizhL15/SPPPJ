@extends('layouts.front')
@section('title','Daftar Pesanan')
@section('content')

<body>
  <!-- Tabel -->
  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mt-4 mb-3 fw-bold">Riwayat Pemesanan</h2>

      <div class="table-responsive">
        <table class="table" style="font-size: 18px">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pesan</th>
              <th>Status</th>
              {{-- <th>Jumlah Barang</th> --}}
              <th>Total Harga</th>              
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($pesanans as $pesanan)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pesanan->tanggal }}</td>
                <td>
                  @if($pesanan->status == 1)
                  Menunggu Pembayaran
                  @elseif($pesanan->status == 2)
                  Menunggu Verifikasi
                  @elseif($pesanan->status == 3)
                  Pesanan Diproses
                  @elseif($pesanan->status == 4)
                  Pesanan Dikirim
                  @elseif($pesanan->status == 6)
                  Pesanan Siap Diambil
                  @elseif($pesanan->status == 5)
                  Selesai
                  @else
                   
                  @endif
                </td>
                {{-- <td>{{ $pesanan->jumlah_barang }}</td> --}}
                <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                <td>
                  <a href="{{ url('riwayat-pesanan') }}/{{ $pesanan->id }}" class="btn btn-success btn-sm mb-2">Lihat Pesanan</a>
                  @if(empty($pesanan->bukti_pembayaran))
                  <form action="{{ url('riwayat-pesanan') }}/{{ $pesanan->id }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus Pesanan ?');">Batalkan Pesanan</button>
                  </form>
                  @endif

                  @if($pesanan->status == 4)
                  <form action="{{ url('selesai-pesanan', $pesanan->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm mt-2" >Selesai</button>
                  </form>
                  @endif
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