@extends('layouts.admin')
@section('title','Detail Pesanan')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Detail Pesanan</h1>


    <div class="col-md-12">
      <div class="card mt-2">
          <div class="card-body">
              @if(!empty($pesanan))
              <table class="table fw-bold">
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
                          <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                          <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                      </tr>
                      <tr>
                          <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                          <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                      </tr>
                       <tr>
                          <td colspan="5" align="right"><strong>Total yang harus dibayarkan :</strong></td>
                          <td align="right"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>   
                      </tr>
                      
                      <tr>
                        <td align="left" style="font-size: 18px"><strong>Bukti Pembayaran :</strong></td>
                        <td align="center"><img src="{{ asset('/storage/pembayaran/'.$pesanan->bukti_pembayaran) }}" width="300px" height="400px" alt="..."></td>
                      </tr>


                  </tbody>
              </table>
              @endif
          </div>
      </div>
    </div>

@endsection

