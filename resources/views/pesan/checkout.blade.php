@extends('layouts.front')
@section('title','Keranjang')
@section('content')

<body>

  <div class="container-fluid py-5">
    <div class="container">
      <h2 class="text-center mt-4 fw-bold">Keranjang Produk</h2>
      <div class="row mt-4">
        <div class="col-md-12 mb-3">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mb-3">
          <div class="card">
              <div class="card-body fw-bold">
                <div class="mb-2">
                  @if(!empty($pesanan))
                      <h5 align="right" class="fw-bold mb-2 mt-2" >Tanggal Pesan : {{ $pesanan->tanggal }}</h5>
                      <table class="table table-striped mt-2">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Gambar</th>
                                  <th>Nama Barang</th>
                                  <th>Jumlah</th>
                                  <th>Harga</th>
                                  <th>Total Harga</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $no = 1; ?>
                              @foreach($pesanan_details as $pesanan_detail)
                              <tr>
                                  <td>{{ $no++ }}</td>
                                  <td>
                                      <img src="{{ asset('/storage/produk/'.$pesanan_detail->produk->gambar) }}" width="100" alt="...">
                                  </td>
                                  <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                                  <td>{{ $pesanan_detail->jumlah }} </td>
                                  <td >Rp. {{ number_format($pesanan_detail->produk->harga_produk) }}</td>
                                  <td >Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                  <td>
                                      <form action="{{ url('checkout') }}/{{ $pesanan_detail->id }}" method="post">
                                          @csrf
                                          {{ method_field('DELETE') }}
                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Untuk Menghapus Produk di Keranjang ?');"><i class="bi bi-trash3-fill"></i> Hapus</button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                              
                            

                              <tr>
                                  <td colspan="5" align="right"><strong>Total Harga  :   </strong></td>
                                  <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                  @if(($pesanan->jumlah_harga) > 0)
                                  <td></td>
                                  @else
                                  <td></td>
                                  @endif
                              </tr>
                              
                          </tbody>
                      </table>
                    @endif
                </div>

                @if(!empty($pesanan))
                <form method="post" enctype="multipart/form-data" action="{{ url('konfirmasi') }}" class="mt-2" >
                      @csrf
                      <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Nama Pesanan</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_pesanan" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="alamat" required>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Kecamatan</label>
                          <div class="col-sm-10">
                              <select class="form-select" name="kecamatan" aria-label="Default select example" aria-placeholder="Pilih Kecamatan">
                                  {{-- <option selected>Pilih Kecamatan</option> --}}
                                  <option value="Sukoharjo">Sukoharjo</option>
                                  <option value="Pringsewu">Pringsewu</option>     
                                </select>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Kabupaten</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="kabupaten" aria-label="Default select example" aria-placeholder="Pringsewu">
                                <option selected>Pringsewu</option>
                            </select>
                          </div>
                      </div>
                      
                      <div class="row mb-4">
                          <label for="" class="col-sm-2 col-form-label">Jenis Pesanan</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="jenis_pesanan" aria-label="Default select example" aria-placeholder="Pilih Jenis Pesanan">
                                <option value="Pickup">Pickup</option>
                                <option value="Delivery">Delivery</option> 
                            </select>
                          </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-success margin-auto" align="center"><i class="bi bi-cart-fill"></i> Checkout</button>
                      </div>
                </form>
                @else
                    <div class="row">
                        <h4 class="text-center  ">Tidak Ada Produk Dalam Keranjang</h4>
                        <h4 class="text-center">Silahkan Pilih Produk Pada Halaman Produk</h4>
                    </div>
                @endif
                
                      
                      {{-- <a href="{{ url('konfirmasi') }}" class="btn btn-success text-center" onclick="return confirm('Pastikan Pesanan Anda Sudah Sesuai ?');">
                        <i class="bi bi-cart-fill"></i> Checkout
                      </a> --}}
                  
              </div>
            </div>
        </div>
        
      </div>
    </div>
    </div>  
  </div>
  
@endsection