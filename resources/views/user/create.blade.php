@extends('layouts.admin')
@section('title','Tambah Pengguna')
@section('main-content')
    <!-- Page Heading -->
    <h1>Tambah Pengguna Baru</h1>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Lastname</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="no_telepon">No. Telepon</label>
            <input type="number" minlength="10" maxlength="13" name="no_telepon" class="form-control" required>
        </div>
        {{-- <div class="form-group mb-3">
            <label for="role_id">Role</label>
            <input type="number" name="role_id" class="form-control" required>
        </div> --}}
        <div class="form-group mb-3">
        <label for="role_id" class="form-label">Otorisasi</label>
        <select class="form-select" name="role_id">
            @foreach ($roles as $userrole)
                @if (old('role_id') == $userrole->id)
                    <option value="{{ $userrole->id }}" selected>{{ $userrole->role }}</option>
                @else
                    <option value="{{ $userrole->id }}">{{ $userrole->role }}</option>
                @endif
            @endforeach
        </select>
        
        </div>
        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('user.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
@endsection
