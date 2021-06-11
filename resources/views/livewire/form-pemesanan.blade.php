<section id="app" class="my-5">
  <h2 class="h1 fw-lighter">Pesan layanan</h2>
  <div class="row">
    <div class="col-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <h5 class="card-title">1. Pilih Layanan</h5>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pilih layanan</label>
            <div class="row">
              <div class="col-6">
                <div wire:click="changeLayanan(1)" class="card {{ $layanan == 1 ? 'shadow' : '' }}">
                  <img src="rescue.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <span>Penyelamatan</span>
                    <h6 class="card-title mb-0">Rescue</h6>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div wire:click="changeLayanan(2)" class="card {{ $layanan == 2 ? 'shadow' : '' }}">
                  <img src="homecare.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <span>Treatment</span>
                    <h6 class="card-title mb-0">Homecare</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if ($showSublayanan)
          <div id="jenisLayanan" class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis layanan</label>
            <select class="form-select" wire:model="sublayanan">
              <option selected>(Pilih jenis layanan)</option>
              @foreach ($subservices as $subservice)
              <option value="{{$subservice->id}}">{{ $subservice->name }}</option>
              @endforeach
            </select>
          </div>
          @endif
          
          <div id="lokasiLayanan" class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Lokasi layanan</label>
            <select class="form-select" wire:model="lokasi" {{ $lokasiDisabled ? 'disabled' : '' }}>
              <option selected>(Pilih lokasi)</option>
              <option value="1">Rumah sakit</option>
              <option value="2">Kunjungan lokasi</option>
            </select>
          </div>
          @if ($detailKejadianShow)    
          <div id="detailKejadian" class="mb-3">
            <label for="inputDetailKejadian" class="form-label">Detail kejadian</label>
            <textarea class="form-control" id="inputDetailKejadian" rows="3" name="dekripsi_kejadian"></textarea>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <h5 class="card-title">2. Pilih Lokasi</h5>
          <div id="lokasiUser" class="{{ $lokasiUser ? 'd-block' : 'd-none' }}">
            <div wire:ignore id="map" class="map mb-3"></div>
            <div id="detailAlamat" class="mb-3 row">
              <div class="col-12">
                <label for="inputRoad" class="form-label">Detail alamat</label>
                <input id="inputSubdistrict" type="text" class="form-control" name="kelurahan">
              </div>
            </div>
            <div class="mb-3 row">
              <div id="kelurahan" class="col-6 mb-3">
                <label for="inputSubdistrict" class="form-label">Kelurahan</label>
                <input id="inputSubdistrict" type="text" class="form-control" name="kelurahan">
              </div>
              <div id="kecamatan" class="col-6 mb-3">
                <label for="inputPostcode" class="form-label">Kecamatan</label>
                <input id="inputPostcode" type="text" class="form-control" name="kecamatan">
              </div>
            </div>
          </div>
          
          <div id="lokasiRS" class="{{ $lokasiUser ? 'd-none' : 'd-block' }}">
            <div class="card w-100">
              <div class="card-body">
                <h5 class="card-title">RSUD K.R.M.T. Wongsonegoro</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ now() }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <h5 class="card-title">3. Pilih Jadwal</h5>
          @if($jadwalSekarang)
          <div id="jadwalSaatIni">
            <div class="card w-100 mb-3">
              <div class="card-body">
                <h5 class="card-title">Saat ini</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ now() }}</h6>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button class="btn btn-primary">Pesan layanan sekarang</button>
            </div>
          </div>
          @else
          <div id="jadwalUser">
            <div id="jadwal" class="mb-3">
              <label for="inputRoad" class="form-label">Tanggal</label>
              <input id="inputRoad" type="date" class="form-control" name="tanggal">
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <button class="btn btn-primary">Pesan layanan sekarang</button>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>