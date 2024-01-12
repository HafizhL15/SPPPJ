@extends('layouts.admin')
@section('title','Tambah Diskon')
@section('main-content')
    <!-- Page Heading -->
    <h1>Tambah Kode Diskon Baru</h1>
    <form action="{{ route('admin-diskon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3 col-6">
            <label for="diskon">Jumlah Diskon</label>
            <input type="number" name="diskon" class="form-control" required>
        </div>

        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('admin-diskon.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
