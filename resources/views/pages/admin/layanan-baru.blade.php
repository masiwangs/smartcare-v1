@extends('pages.admin.layout')

@section('content')
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <x-admin-sidebar/>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Layanan Baru
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/administrator/layanan">Layanan</a></li>
              <li class="breadcrumb-item active">Baru</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @if (\Session::has('success'))    
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
              {{ \Session::get('success') }}
            </div>
            @endif
            @if (\Session::has('error'))    
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Gagal!</h5>
              {{ \Session::get('error') }}
            </div>
            @endif
            <form action="/administrator/layanan-baru" method="POST" class="card">
              <div class="card-body">
                <div>
                  @csrf
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Nama layanan</label>
                    <div class="col-4">
                      <input type="text" class="form-control @error('name') border-danger @enderror" name="name" value="">
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-10">
                      <textarea class="form-control" name="description" rows="3"></textarea>
                      @error('description')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Status ketersediaan</label>
                    <div class="col-10 d-flex align-items-center">
                      <div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="is_available" id="inlineRadio1" value="1" checked>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="is_available" id="inlineRadio2" value="0">
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                      @error('is_available')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Melayani Homevisit</label>
                    <div class="col-10 d-flex align-items-center">
                      <div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="is_homevisitable" id="inlineRadio1" value="1" checked>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="is_homevisitable" id="inlineRadio2" value="0">
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                      @error('is_homevisitable')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-success" type="submit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection