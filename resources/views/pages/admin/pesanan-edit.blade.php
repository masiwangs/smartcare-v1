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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Pesanan {{ $order->code }}
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
              <li class="breadcrumb-item"><a href="/administrator/pesanan">Pesanan</a></li>
              <li class="breadcrumb-item active">{{ $order->code }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
            <form action="/administrator/pesanan/{{ $order->code }}" method="POST" class="card">
              <div class="card-body">
                <div>
                  @csrf
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Kode pemesanan</label>
                    <div class="col-4 d-flex align-items-center">
                      <p class="mb-0">{{ $order->code }}</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">User</label>
                    <div class="col-4 d-flex align-items-center">
                      <a href="/administrator/user/{{ $order->user_id }}">{{ $order->user->name }}</a>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Layanan</label>
                    <div class="col-4 d-flex align-items-center">
                      <p class="mb-0">{{ $order->service->name }} - {{ $order->subservice_id ? $order->subservice->name : '' }}</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-2 col-form-label">Jadwal</label>
                    <div class="col-4 d-flex align-items-center">
                      <input type="date" class="form-control" name="date" value="{{ $order->date }}">
                      @if ($order->service_id == 1)
                      <input type="time" class="form-control" name="time" value="{{ $order->time }}">
                      @endif
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