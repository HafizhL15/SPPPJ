@extends('layouts.front')
@section('title','Daftar Bantuan')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h2 class="text-light text-center mb-3">Butuh Bantuan ? Silahkan Ajukan Permasalahan Disini </h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mt-2 fw-bold">Riwayat Bantuan</h2>
        <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <a href="{{ url('/form-helpdesk') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i>Ajukan Pertanyaan</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="font-size: 18px">
                              <thead class="fw-bold">
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Permasalahan</th>
                                  <th>Keterangan</th>
                                  <th>Status</th>              
                                  <th>Komentar</th>
                                </tr>
                              </thead>
                              <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($helpdesks as $helpdesk)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $helpdesk->tanggal }}</td>
                                        <td>{{ $helpdesk->permasalahan }}</td>
                                        <td>{{ $helpdesk->keterangan }}</td>
                                        <td>
                                        @if($helpdesk->status == 0)
                                        Menunggu Balasan
                                        @elseif($helpdesk->status == 1)
                                        Selesai
                                        @endif
                                        </td>
                                        <td>{{ $helpdesk->komentar }}</td>
                                    </tr>
                                {{-- <tr>
                                    <td>1</td>
                                    <td>23/11/2023</td>
                                    <td>Tidak Bisa Login</td>
                                    <td>Ketika login menggunakan akun saya terdapat tulisan bahwa anda tidak dapat login</td>
                                    <td>Menunggu Balasan</td>
                                    <td>Silahkan untuk melakukan registrasi ulang atau reset password</td>
                                </tr> --}}
                                @endforeach
                              </tbody>
                              
                            </table>
                            <br><br><br><br><br><br><br><br><br>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection