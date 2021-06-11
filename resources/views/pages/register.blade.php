@extends('layouts.app')

@section('title')
  Registrasi
@endsection

@section('content')
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="row d-flex justify-content-center w-100">
      <div class="col-12">
        <div class="card border-0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-7 d-none d-md-flex justify-content-center align-items-center">
                <img src="https://webstockreview.net/images/clipart-hospital-hospita-18.png" style="width: 80%" alt="">
              </div>
              <div class="col-md-5 col-12">
                <p class="h1 fw-light text-primary mb-4">Daftar sekarang juga</p>
                <form action="/register" method="POST" class="mb-4">
                  @csrf
                  <div class="mb-2">
                    <label for="nameInput" class="form-label">Nama lengkap</label>
                    <input type="text" class="form-control" id="nameInput" name="name">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if (\Session::has('email'))
                      <span class="text-danger">{{ \Session::get('email') }}</span>
                    @endif
                  </div>
                  <div class="mb-2">
                    <label for="phoneInput" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control" id="phoneInput" name="phone">
                    @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-2">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email">
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password">
                    @error('password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if (\Session::has('message'))
                      <span class="text-danger">{{ \Session::get('message') }}</span>
                    @endif
                  </div>
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary">Daftar sekarang</button>
                  </div>
                </form>
                <div class="d-flex justify-content-center">
                  <p>Sudah memiliki akun? <a href="/login">Masuk</a></p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
@endsection
