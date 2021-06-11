@extends('layouts.app')

@section('title')
  Pesanan Anda
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <div class="row mb-5 d-flex justify-content-center"> 
      <div class="col-md-6">
        <form action="/pesanan/{{ $order->code }}/batalkan" method="POST" class="card text-center">
          @csrf
          <div class="card-header bg-danger">
            <h5 class="card-title text-white">Batalkan pesanan</h5>
          </div>
          <div class="card-body">
            <p class="card-text">Batalkan pesanan {{ $order->code }}?</p>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-danger">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <x-footer/>
@endsection

@section('script')
@endsection