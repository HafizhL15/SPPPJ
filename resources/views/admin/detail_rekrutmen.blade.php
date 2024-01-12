@extends('layouts.admin')
@section('title','Data Rekrutmen')
@section('main-content')
    <!-- Page Heading -->
    <h1 class="text-center">Data Rekrutmen</h1>
    <br>

    <div class="col-md-6 col-lg-6">
        {{-- <h3 class="fw-bold">Data Rekrutmen</h3> --}}
        <table class="table fw-bold">
          <thead>
            <tr>
                <td >Nama Lengkap</td>
                <td >: {{ $rekrutmen->nama_lengkap }}</td>
            </tr>
            <tr>
                <td >NIK</td>
                <td >: {{ $rekrutmen->nik }}</td>
            </tr>            
            <tr>
                <td >Jenis Kelamin</td>
                <td >: {{ $rekrutmen->jenis_kelamin }}</td>
            </tr> 
            <tr>
                <td >Tempat Tanggal Lahir</td>
                <td >: {{ $rekrutmen->tempat_lahir }}, {{ $rekrutmen->tanggal_lahir }}</td>
            </tr> 
            <tr>
                <td >Alamat</td>
                <td >: {{ $rekrutmen->alamat }}</td>
            </tr> 
            <tr>
                <td >Email</td>
                <td >: {{ $rekrutmen->email }}</td>
            </tr> 
            <tr>
                <td >No. Handphone</td>
                <td >: {{ $rekrutmen->no_telepon }}</td>
            </tr> 
            <tr>
                <td >Status Pernikahan</td>
                <td >: {{ $rekrutmen->status }}</td>
            </tr> 
            <tr>
                <td >Resume CV</td>
                <td><a href="{{ route('unduh.resume', ['id' => $rekrutmen->id]) }}" class="btn btn-primary">Download Resume</a></td>
            </tr> 
                    
          </thead>
        </table>
    </div>
@endsection
