@extends('layouts.admin')
@section('title','Edit Pengguna')
@section('main-content')
    <!-- Page Heading -->
    <h1>Edit Pengguna</h1>
    
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Lastname</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="no_telepon">No. Telepon</label>
            <input type="number" minlength="10" maxlength="13" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}" class="form-control" required>
        </div>
        <div class="form-group mb-3">
        <label for="role_id" class="form-label">Otorisasi</label>
        <select class="form-select" name="role_id">
            {{-- <option value='1'>Direktur</option>
            <option value='2'>Customer Service</option>
            <option value='3'>Staff Teknisi</option>
            <option value='4'selected='selected'>Pelanggan</option>
            <option value='5'>Admin</option> --}}

            @foreach ($roles as $userrole)
                @if (old('role_id') == $userrole->id)
                    <option value="{{ $userrole->id }}" selected>{{ $userrole->role }}</option>
                @else
                    <option value="{{ $userrole->id }}">{{ $userrole->role }}</option>
                @endif
            @endforeach
        </select>

        <div class="form-group d-flex justify-content">
            <button type="submit" class="btn btn-success my-2" >Submit</button>
            <br>
            <a href="{{ route('user.index') }}" type="button" class="btn btn-primary my-2"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>

@endsection
