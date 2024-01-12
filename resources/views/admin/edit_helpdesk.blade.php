@extends('layouts.admin')
@section('title','Edit Helpdesk')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center fw-bold">Edit Data Bantuan</h1>
    <br>
    <table class="table table-bordered" style="font-size: 16px">
        <thead >
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Permasalahan</th>
                <th>Keterangan</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $helpdesk->nama }}</td>
                <td>{{ $helpdesk->tanggal }}</td>
                <td>
                    @if($helpdesk->status == 0)
                    Menunggu Balasan
                    @elseif($helpdesk->status == 1)
                    Selesai
                    @endif
                </td>
                <td>{{ $helpdesk->permasalahan}}</td>
                <td>{{ $helpdesk->keterangan}}</td>
                <td>{{ $helpdesk->komentar}}</td>
            </tr>
        </tbody>
    </table>

    <div class="col-md-8 " >
        <div class="card mt-2">
            <div class="card-body fw-bold">
                <form action="{{ route('admin_helpdesk.update', $helpdesk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3" style="font-size: 20px">
                        <label for="komentar">Komentar</label>
                        <input type="text" name="komentar" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" style="font-size: 20px">Status Pesanan Saat Ini : 
                            @if($helpdesk->status == 0)
                            Menunggu Balasan
                            @elseif($helpdesk->status == 1)
                            Selesai
                            @endif
                        </label><br>
                        <select class="form-select" name="status" required>
                            <option value="0">Menunggu Balasan</option>
                            <option value="1">Selesai</option>
                        </select>
                    </div>
                    

                    <div class="form-group d-flex justify-content">
                        <button type="submit" class="btn btn-success" >Update</button>                        
                    </div>
                </form>

                
            </div>
        </div>
    </div>
@endsection
