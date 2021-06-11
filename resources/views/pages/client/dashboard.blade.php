@extends('layouts.app')

@section('title')
  Halaman depan
@endsection

@section('content')
  <x-navbar/>
  <div class="container mt-md-5 mt-4">
    <div class="row mb-5"> 
      <div id="carouselExampleSlidesOnly" class="carousel slide" style="max-height: 240px" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-height: 240px; overflow-y:hidden">
          <div class="carousel-item active">
            <img src="slide1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="slide2.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
    <section id="app" class="my-5">
      <h1 class="fw-light">Pilih layanan</h1>
      <div class="row">
        <div class="col-6">
          <div class="card mb-3" >
            <div class="row g-0">
              <div class="col-md-4">
                <img src="rescue.jpg"  style="width: 100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Rescue/ Penyelamatan</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a href="/pesanan-baru/rescue" class="btn btn-sm btn-outline-danger">Pesan layanan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="homecare.jpg" style="width: 100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Treatment/ Homecare</h5>
                  <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                  <a href="/pesanan-baru/homecare" class="btn btn-sm btn-outline-primary">Pesan layanan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
    </section>
  </div>
  <x-footer/>
@endsection

@section('script')
  <script>
    // function getAddress(lat, lng){
    //   $('input[name=location_lat]').val(lat)
    //   $('input[name=location_lng]').val(lng)
    //   $('input[name=address_road]').attr('disabled', true)
    //   $('input[name=address_village]').attr('disabled', true)
    //   $('input[name=address_subdistrict]').attr('disabled', true)
    //   $('input[name=address_regency]').attr('disabled', true)
    //   $('input[name=address_province]').attr('disabled', true)
    //   $('input[name=address_postcode]').attr('disabled', true)
    //   $('input[name=address_road]').val('Loading...')
    //   $('input[name=address_village]').val('Loading...')
    //   $('input[name=address_subdistrict]').val('Loading...')
    //   $('input[name=address_regency]').val('Loading...')
    //   $('input[name=address_province]').val('Loading...')
    //   $('input[name=address_postcode]').val('Loading...')
    //   var key = '8515ada2c05c4deaa3ad00d11a101a4a'
    //   $.ajax({
    //     method: 'GET',
    //     url: `https://api.opencagedata.com/geocode/v1/json?q=${lat}%2C${lng}&key=${key}&language=id&no_annotations=1`
    //   })
    //   .done(function( msg ) {
    //     var results = msg.results
    //     var address = results[0].components
    //     console.log(results[0])
    //     $('input[name=address_road]').attr('disabled', false)
    //     $('input[name=address_village]').attr('disabled', false)
    //     $('input[name=address_subdistrict]').attr('disabled', false)
    //     $('input[name=address_regency]').attr('disabled', false)
    //     $('input[name=address_province]').attr('disabled', false)
    //     $('input[name=address_postcode]').attr('disabled', false)
    //     $('input[name=address_road]').val(`${address.road}`)
    //     $('input[name=address_village]').val(`${address.village}`)
    //     $('input[name=address_subdistrict]').val(`${address.suburb}`)
    //     $('input[name=address_regency]').val(`${address.city ?? address.county ?? address.house}`)
    //     $('input[name=address_province]').val(`${address.state}`)
    //     $('input[name=address_postcode]').val(`${address.postcode ?? ''}`)
    //   });
    // }

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
      getAddress(lat, lng)
      $('#coordenateInput').val(`${lat}, ${lng}`)
    });
    
  </script>
@endsection