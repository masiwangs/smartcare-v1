@extends('layouts.app')

@section('title')
  Pesanan Baru - Rescue
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <h1 class="fw-light mb-4">Pesan layananan rescue/penyelamatan</h1>
    <form action="/pesanan-baru/homecare" method="POST">
      @csrf
      <div  class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Pilih layanan</label>
        <select class="form-select" name="subservice_id">
          <option selected>Pilih layanan</option>
          @foreach ($subservices as $subservice)
          <option value="{{ $subservice->id }}">{{ $subservice->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn-danger">Simpan</button>
      </div>
    </form>
  </div>
  <x-footer/>
@endsection