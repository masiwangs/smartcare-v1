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
              Pesanan
              @if (\Request::query('status') == 1) Baru @endif
              @if (\Request::query('status') == 2) Dikonfirmasi @endif
              @if (\Request::query('status') == 3) Dilaksanakan @endif
              @if (\Request::query('status') == 4) Menunggu pembayaran @endif
              @if (\Request::query('status') == 5) Selesai @endif
              @if (\Request::query('status') == 6) Gagal @endif
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
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
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>Kode pemesanan</th>
                        <th>User</th>
                        <th>Waktu</th>
                        <th>Layanan</th>
                        <th>Keterangan</th>
                        <th style="width: 3rem">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)    
                      <tr>
                        <td>
                          {{ $order->code }}<br/>
                          <a href="/administrator/pesanan/{{ $order->code }}">Lihat detail</a>
                        </td>
                        <td>
                          <p class="mb-0">{{ $order->user->name }}</p>
                          <small>{{ $order->phone ?? $order->user->phone }}</small><br/>
                          @php
                            $nomor_hp = $order->phone ?? $order->user->phone;
                            $nomor_pertama = Str::substr($nomor_hp, 0, 1);
                            if($nomor_pertama == '0'){
                              $hp = '62'.Str::substr($nomor_hp, 1, Str::length($nomor_hp) -1);
                            }else if($nomor_pertama == '6'){
                              $hp = $nomor_hp;
                            }else{
                              $hp = false;
                            }
                          @endphp
                          <a @if ($hp) href="https://web.whatsapp.com/send?phone={{ $hp }}" @else href="#" @endif target="_blank" class="text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" fill = "green" width="16" height="16" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            @if ($hp) Hubungi user @else Nomor tidak valid @endif
                          </a>
                        </td>
                        <td>
                          {{ $order->date }}<br/>{{$order->time}}
                        </td>
                        <td>
                          {{ $order->service->name }}<br/>
                          <small>{{ $order->subservice_id ? $order->subservice->name : '' }}</small>
                        </td>
                        <td>
                          <small>{{ $order->description }}</small>
                        </td>
                        <td class="d-flex flex-column">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle mb-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Ubat status
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                                @csrf
                                <input type="hidden" name="status_id" value="2">
                                <button type="submit" class="dropdown-item @if($order->status_id == 2) bg-primary @endif"><i class="fas fa-clipboard-check"></i> Konfirmasi</button>
                              </form>
                              <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                                @csrf
                                <input type="hidden" name="status_id" value="3">
                                <button type="submit" class="dropdown-item @if($order->status_id == 3) bg-primary @endif"><i class="fas fa-stethoscope"></i> Laksanakan</button>
                              </form>
                              <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                                @csrf
                                <input type="hidden" name="status_id" value="4">
                                <button type="submit" class="dropdown-item @if($order->status_id == 4) bg-primary @endif"><i class="fas fa-hand-holding-usd"></i> Tunggu pembayaran</button>
                              </form>
                              <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                                @csrf
                                <input type="hidden" name="status_id" value="5">
                                <button type="submit" class="dropdown-item @if($order->status_id == 5) bg-primary @endif"><i class="fas fa-check-double"></i> Selesai</button>
                              </form>
                              <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                                @csrf
                                <input type="hidden" name="status_id" value="6">
                                <button type="submit" class="dropdown-item @if($order->status_id == 6) bg-primary @endif"><i class="fas fa-times-circle"></i> Gagal</button>
                              </form>
                            </div>
                          </div>
                          @if ($order->status_id < 6)    
                          <a href="/administrator/pesanan/{{ $order->code }}" class="btn btn-sm btn-info w-100 mb-1">Ubah jadwal</a>
                          <form action="/administrator/pesanan/{{ $order->code }}/status" method="POST">
                            @csrf
                            <input type="hidden" name="status_id" value="6">
                            <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                          </form>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection