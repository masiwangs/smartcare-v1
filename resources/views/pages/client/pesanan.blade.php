@extends('layouts.app')

@section('title')
  Pesanan Anda
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    @livewire('client-order-table')
  </div>
  <x-footer/>
@endsection

@section('script')
@endsection