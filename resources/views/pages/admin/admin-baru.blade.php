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
              Tambah Admin Baru
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Dashboard</a></li>
              <li class="breadcrumb-item active">Daftar layanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form action="/administrator/admin-baru" method="POST" class="card">
              @csrf
              <input type="hidden" name="action" value="reset">
              <div class="card-header">
                <h5 class="card-title">Admin baru</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label for="emailInput" class="form-label">Email address</label>
                  <input class="form-control" name="email" list="emailInput" placeholder="Ketik untuk mencari...">
                  <datalist id="datalistOptions">
                    @foreach ($users as $user)
                    <option value="{{ $user->email }}">
                    @endforeach
                  </datalist>
                </div>
                <p><i class="fas fa-exclamation-triangle"></i> Masukkan password Anda untuk menambahkan admin baru</p>
                <div class="mb-3">
                  <label class="form-label">Password Anda:</label>
                  <input type="password" class="form-control" placeholder="Minimal 6 karakter">
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Tambahkan</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection