@extends('layouts.front')
@section('title','Detail Pesanan')
@section('content')

<body>
  <!-- Tabel -->
  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mt-4 mb-3 fw-bold">Detail Pemesanan</h2>

      <div class="col-md-12">
        <div class="card">
            <div class="card-body fw-bold">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Pesanan</td>
                            <td >:</td>
                            <td>{{ $pesanan->nama_pesanan }}</td>
                        </tr>
                        <tr>
                          <td>Jenis Pesanan</td>
                          <td>:</td>
                          <td>{{ $pesanan->jenis_pesanan }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $pesanan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>{{ $pesanan->kecamatan }}</td>
                        </tr>
                        <tr>
                          <td>Kabupaten</td>
                          <td>:</td>
                          <td>{{ $pesanan->kabupaten }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body">
                @if(!empty($pesanan))
                
                <h5 align="right">Tanggal Pesanan : {{ $pesanan->tanggal }}</h5><hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th style="text-align:right">Harga</th>
                            <th style="text-align:right">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ asset('/storage/produk/'.$pesanan_detail->produk->gambar) }}" width="100" alt="..."></td>
                            <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                            <td>{{ $pesanan_detail->jumlah }} unit</td>
                            <td align="right">Rp. {{ number_format($pesanan_detail->produk->harga_produk) }}</td>
                            <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td> 
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="5" align="right"><strong>Diskon Potongan Harga :</strong></td>
                          <td align="right"><strong>Rp. {{ number_format($diskon)}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                            <td align="right"><strong>Rp. {{ $pesanan->kode }}</strong></td>
                        </tr>
                         <tr>
                            <td colspan="5" align="right"><strong>Total yang harus dibayarkan :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>   
                        </tr>
                        @if(empty($pesanan->bukti_pembayaran))
                        <tr>
                          <td colspan="5" align="right"><strong>Bukti Pembayaran :</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" align="right"> 
                            <form method="post" enctype="multipart/form-data" action="{{ url('konfirmasi-pesanan') }}/{{ $pesanan->id }} " >
                              @csrf
                                <input align="right" type="file" name="bukti_pembayaran" accept="image/*" class="col-auto" required><br>
                                <button type="submit" class="btn btn-primary btn-sm ms-3">Kirim Bukti</button>
                            </form>
                          </td>
                        </tr>
                        @else
                        <tr>
                          <td colspan="5" align="right"><strong>Bukti Pembayaran :</strong></td>
                          <td align="right"><img src="{{ asset('/storage/pembayaran/'.$pesanan->bukti_pembayaran) }}" width="100" alt="..."></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        @if(($diskon === 0))
        <div class="col-md-12 mt-3 fw-bold" align="center">
          <div class="card">
            <form method="post" enctype="multipart/form-data" action="{{ url('riwayat-pesanan') }}/{{ $pesanan->id }} " >
              @csrf
                <label class="mx-4 mt-2">Punya Kupon Diskon ? Silahkan Masukkan Dibawah Ini</label><br>
                <input type="text" name="kode_diskon" class="col-auto mt-3 mb-3 mx-1" required>
                <button type="submit" class="btn btn-primary btn-sm mt-3 mb-3 fw-bold mx-4">Gunakan Kode</button>
            </form>
            @if(session('error'))
                <p class="mx-5 fw-bold" style="color: red;">{{ session('error') }}</p>
            @endif
          </div>
        </div>
        @endif

        @if(empty($pesanan->bukti_pembayaran))
          <div class="card mt-3">
            <div class="card-body text-center">
                <h5 class="text-center mb-3"> <strong>Pesanan Anda Sudah Sukses Selanjutnya Silahkan Untuk Pilih Jenis Pembayaran</strong></h5>   
                <div>
                  <button onclick="tampilkanKonten('{{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}')" class="btn btn-secondary me-3 fw-bold">TRANSFER BANK</button>
                  <button onclick="tampilkanKonten('{{ asset('img/qris.png') }}')" class="btn btn-warning me-3 fw-bold">SHOPEEPAY</button>
                  <button onclick="tampilkanKonten('{{ asset('img/dana.png') }}')" class="btn btn-info me-3 fw-bold">DANA</button>
                  <button onclick="tampilkanKonten('{{ asset('img/gopay.png') }}')" class="btn btn-success me-3 fw-bold">GOPAY</button>
                </div>
                
                <div id="tampilanKonten" class="mt-2 mb-2 text-center" style="font-size: 20px"></div>
                <h5 class="text-center mt-3"> <strong>Batas waktu pembayaran paling lama 24 jam</strong></h5>
              </div>
          </div>
        
        @else
        <div class="card mt-3">
          <div class="card-body">
              <h5 class="text-center"> <strong> Mohon menunggu verifikasi pembayaran paling lama 1 x 24 jam</strong></h5>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection

