@extends('layouts.app')

@section('title')
  Halaman depan
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <section class="text-center">
      <img class="rounded-circle" src="/rescue.jpg" width="100" height="100" alt="">
      <h2 class="fw-light">{{ Auth::user()->name }}</h2>
      <p>{{ Auth::user()->email }} | {{ Auth::user()->phone }}</p>
    </section>
    <hr>
    <section>
      <div class="row mb-5" style="width: 100%">
        <div class="col-2">
          <div class="nav flex-column nav-pills me-3" aria-orientation="vertical">
            <a href="/profil" class="nav-link">Informasi Akun</a>
            <a href="/keamanan" class="nav-link active">Keamanan</a>
          </div>
        </div>
        <div class="col-10">
          <div class="card border-0">
            <div class="card-body w-100">
              <p class="h4 fw-light mb-4">Ubah keamanan akun</p>
              <form action="/keamanan" method="POST">
                @csrf
                <div class="mb-3 row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password lama</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                  </div>
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="inputNewPassword" class="col-sm-2 col-form-label">Password baru</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputNewPassword" name="new_password">
                  </div>
                  @error('new_password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3 row">
                  <label for="inputNewPasswordConfirm" class="col-sm-2 col-form-label">Konfirmasi password baru</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="inputNewPasswordConfirm" name="new_password_confirm">
                  </div>
                  @error('new_password_confirm')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                @if (\Session::has('message'))
                    <p class="mb-0">{{ \Session::get('message') }}</p>
                @endif
                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <x-footer/>
@endsection

@section('script')

@endsection