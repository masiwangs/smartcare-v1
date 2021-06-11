@extends('layouts.app')

@section('title')
  Pesanan Baru - Rescue
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <h1 class="fw-light mb-4">Pesan layananan rescue/penyelamatan</h1>
    <form action="/pesanan-baru/rescue" method="POST" class="row">
      @csrf
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <p class="h5 fw-light">Pilih lokasi</p>
          <div id="map" class="map"></div>
          <input type="hidden" name="location_lat">
          <input type="hidden" name="location_lng">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <p class="h5 fw-light">Deskripsi kejadian</p>
          <textarea name="description" rows="3" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <p class="h5 fw-light">Nomor HP yang bisa dihubungi</p>
          <input type="number" name="phone" class="form-control">
        </div>
        @foreach ($errors->all() as $item)
            {{ $item->message }}
        @endforeach
        <button class="btn btn-danger">Simpan</button>
      </div>
    </form>
  </div>
  <x-footer/>
@endsection

@section('script')
<script>
  var map = L.map('map').setView([-7.0347559, 110.4646523], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWF1bGFuYWlhIiwiYSI6ImNrbnp0bXV1OTA0dnQyd2wwNzV4Y3gzazUifQ.SoeDzAq23ssaaSoLE4oJVw'
    }).addTo(map);

    var layerGroup = L.layerGroup().addTo(map);

    map.on('click', function(e){
      var coord = e.latlng;
      var lat = coord.lat;
      var lng = coord.lng;
      layerGroup.clearLayers();

      L.marker(coord).addTo(layerGroup);
      $('input[name=location_lat]').val(lat)
      $('input[name=location_lng]').val(lng)
    });
</script>
@endsection