@extends('layouts.app')

@section('title')
  Profil
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    @livewire('client-profile')
  </div>
  <x-footer/>
@endsection

@section('script')

@endsection