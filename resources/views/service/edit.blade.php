@extends('layouts.admin')
@section('title','Edit Service Barang')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center fw-bold">Update Service Barang</h1>
    <br>

    <div class="col-md-12">
        <div class="card mt-2">
            <div class="card-body">
                <table class="table fw-bold">
                  <tbody>
                      <tr>
                        <td>Nama Pelanggan</td>
                        <td>:</td>
                        <td>{{ $service->nama_pelanggan }}</td>
                      </tr>
                      <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>{{ $service->nama_barang }}</td>
                      </tr>
                      <tr>
                        <td>Kode Service</td>
                        <td>:</td>
                        <td>{{ $service->kode_booking }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Service</td>
                        <td>:</td>
                        <td>{{ $service->tanggal_masuk }}</td>
                      </tr>
                      <tr>
                          <td>Kerusakan</td>
                          <td>:</td>
                          <td>{{ $service->keterangan}}</td>
                      </tr>
                      <tr>
                        <td>Status Service</td>
                        <td>:</td>
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
                      </tr>
                      <tr>
                        <td>Estimasi Perbaikan</td>
                        <td>:</td>
                        <td>{{ $service->estimasi }}</td>
                      </tr>
                      <tr>
                        <td>Biaya</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($service->biaya) }}</td>
                      </tr>
                      <tr>
                        <td>Catatan</td>
                        <td>:</td>
                        <td>{{ $service->catatan }}</td>
                      </tr>
                      <tr>
                        <td>Gambar Barang</td>
                        <td>:</td>
                        <td><img src="{{ asset('/storage/barang_service/'.$service->gambar_barang) }}" style="width: 200px; height:200px"></td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>

    {{-- <table class="table table-bordered" style="font-size: 16px">
        <thead >
            <tr>
                <th>Nama</th>
                <th>Gambar Barang</th>
                <th>Kode Booking</th>
                <th>Tanggal Booking</th>
                <th>Nama Barang</th>
                <th>Status</th>              
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $service->nama_pelanggan }}</td>
                <td><img src="{{ asset('/storage/barang_service/'.$service->gambar_barang) }}" style="width: 80px; height:80px"></td>
                <td>{{ $service->kode_booking }}</td>
                <td>{{ $service->tanggal_masuk }}</td>
                <td>{{ $service->nama_barang }}</td>
                <td>
                    @if($service->status == 0)
                    Menunggu Barang Service
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
                <td>{{ $service->keterangan }}</td>
            </tr>
        </tbody>
    </table> --}}

    <div class="col-md-12 " >
        <div class="card mt-2">
            <div class="card-body fw-bold">
                <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="status" style="font-size: 20px">Status Perbaikan : </label><br>
                        <select class="form-select" name="status" required>
                            <option value="0">Menunggu Barang Service</option>
                            <option value="1">Barang Diterima</option>
                            <option value="2">Dalam Perbaikan</option>
                            <option value="3">Menunggu Spare Part</option>
                            <option value="4">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="estimasi" style="font-size: 18px">Estimasi Perbaikan (Dalam Hari)</label><br>
                        <input type="number" name="estimasi" class="form-control" value="{{ old('estimasi') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="biaya" style="font-size: 18px">Biaya</label><br>
                        <input type="number" name="biaya" class="form-control" value="{{ old('biaya') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="catatan" style="font-size: 18px">Catatan</label><br>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="catatan" cols="30" rows="5" value="{{ old('catatan') }}" required></textarea>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-success fw-bold text-center" >Update</button>                        
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection
