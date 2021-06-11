@extends('layouts.app')

@section('title')
  Pesanan Baru - Homecare
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4" style="min-height: 80vh">
    <h1 class="fw-light mb-4">Pesan layananan treatment/homecare</h1>
    <form action="/pesanan-baru/homecare/{{ $subservice->id }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="" class="form-label">Pilih layanan</label>
        <select class="form-select" disabled>
          <option selected value="{{ $subservice->id }}">{{ $subservice->name }}</option>
        </select>
        <input type="hidden" name="subservice_id" value="{{ $subservice->id }}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Pilih lokasi</label>
        @if (!$subservice->is_homevisitable)
        <select class="form-select" disabled aria-label="Default select example">
          <option value="1">Rumah</option>
          <option selected value="2">RS K.M.R.T Wongsonegoro</option>
        </select>
        <input type="hidden" name="location" value="2">
        @else
        <select class="form-select" aria-label="Default select example">
          <option value="1">Rumah</option>
          <option value="2">RS K.M.R.T Wongsonegoro</option>
        </select>
        @endif
      </div>
      @if ($subservice->is_homevisitable)
      <div id="mapSection" class="mb-3">
        <label for="" class="form-label">Lokasi rumah (Klik pada peta)</label>
        <div id="map" class="map"></div>
        <input type="hidden" name="location_lat">
        <input type="hidden" name="location_lng">
      </div>
      @endif
      <div class="mb-3">
        <label for="" class="form-label">Jadwal</label>
        <input type="date" class="form-control" name="date" id="">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Keterangan</label>
        <textarea class="form-control" name="description" id="" cols="" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Nomor HP</label>
        <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn-danger">Simpan</button>
      </div>
    </form>

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
  </div>
  <x-footer/>
@endsection

@section('script')
<script>
  var mapSection = $('#mapSection');
  var locationSelect = $('select[name=location]');

  locationSelect.change(function(){
    var selectedLocation = $(this).children("option:selected").val();
    if(selectedLocation == 2){
      mapSection.hide()
    }else{
      mapSection.show()
    }
  })

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