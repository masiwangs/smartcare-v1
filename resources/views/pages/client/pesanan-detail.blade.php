@extends('layouts.app')

@section('title')
  Pesanan Anda
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <div class="row mb-5"> 
      <div class="col-12">
        <div class="card border-0">
          <div class="card-body">
            <h1 class="fw-light">{{ $order->code }}</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-footer/>
@endsection

@section('script')
@endsection