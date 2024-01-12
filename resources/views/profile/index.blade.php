@extends('layouts.front')
@section('title','Profile')
@section('content')

<body>
  <!-- banner -->
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container-md">
        {{-- <div class="row mt-4">
            <div class="col-md-12">
                <h2>TEsting</h2>
            </div>
        </div> --}}
      <h2 class="text-light text-center mb-3 fw-bold">Profile</h2>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        {{-- <h2 class="text-center fw-bold">Profile</h2> --}}
        <div class="row mt-2">
            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body fw-bold">
                        <h4 class="fw-bolder"><i class="bi bi-person-circle "></i> My Profile</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->name }} {{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td>:</td>
                                    <td>{{ $user->no_telepon }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card fw-bold">
                    <div class="card-body">
                        <h4 class="fw-bolder"><i class="bi bi-pencil-square"></i> Edit Profile</h4>
                        <form method="POST" action="{{ url('profile') }}">
                            @csrf
    
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama Depan') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="last_name" class="col-md-2 col-form-label text-md-right">{{ __('Nama Belakang') }}</label>
    
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Alamat Email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="no_telepon" class="col-md-2 col-form-label text-md-right">No. Telepon</label>
    
                                <div class="col-md-6">
                                    <input id="no_telepon" type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ $user->no_telepon }}" required autocomplete="no_telepon" autofocus>
    
                                    @error('no_telepon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
    
                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection