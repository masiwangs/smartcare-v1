@extends('layouts.app')

@section('title')
  Masuk
@endsection

@section('content')
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="row d-flex justify-content-center w-100">
      <div class="col-12">
        <div class="card border-0 ">
          <div class="card-body">
            <div class="row">
              <div class="col-md-7 d-none d-md-flex justify-content-center align-items-center">
                <img src="https://i.pinimg.com/originals/e6/8b/f0/e68bf0f8d0921a14f9c858564b9beaa3.png" style="width: 50%" alt="">
              </div>
              <div id="app" class="col-md-5 col-12">
                <p class="h1 fw-light text-primary mb-4">Silahkan masuk</p>
                <form action="/login" method="post" class="mb-4">
                  @csrf
                  <div class="mb-2">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password">
                  </div>
                  @error ('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary">Masuk</button>
                  </div>
                </form>
                <div class="d-flex flex-column align-items-center">
                  <p class="mb-0">Belum memiliki akun? <a href="/register">Daftar sekarang</a></p>
                  <p>Lupa password? <a href="/reset-password">Reset</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection