<div class="row mb-5"> 
  <div class="col-3">
    <div class="card border-0 shadow">
      <div class="card-body">
        <h3 class="fw-light">Cari pesanan</h3>
        <div>
          <form wire:submit.prevent="search" class="mb-3">
            <label for="inputKodePesanan" class="form-label">Kode pesanan</label>
            <input type="text" class="form-control form-control-sm" id="inputKodePesanan" wire:model="code" placeholder="Kode">
          </form>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pilih layanan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="service_id" value="" id="selectSemua" {{ \Request::input('service_id') == null ? 'checked' : '' }}>
              <label class="form-check-label" for="selectSemua">
                Semua
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="service_id" value="1" id="selectRescue" {{ \Request::input('service_id') == 1 ? 'checked' : '' }}>
              <label class="form-check-label" for="selectRescue">
                Penyelamatan/ Rescue
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="service_id" value="2" id="selectHomecare" {{ \Request::input('service_id') == 2 ? 'checked' : '' }}>
              <label class="form-check-label" for="selectHomecare">
                Treatment homecare
              </label>
            </div>
          </div>
          <a href="/#pesan" class="btn btn-primary mt-4 w-100">Pesanan baru</a>
        </div>
      </div>  
    </div>
  </div>
  <div class="col-9">
    <div class="card border-0">
      <div class="card-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Kode Pesanan</th>
              <th>Jenis Layanan</th>
              <th>Jadwal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            {{-- @if (count($activities) == 0)
              <tr>
                <td colspan="5">Anda belum memiliki pesanan</td>
              </tr>
            @endif --}}
            @foreach ($orders as $order)
                <tr style="{{$order->status_id == 6 ? 'background-color:rgba(0, 0, 0, 0.075)' : '' }}">
                  <td>
                    @if ($order->service_id == 1)
                      <i class="bi bi-circle-fill text-danger"></i>
                    @else
                      <i class="bi bi-circle-fill text-primary"></i>
                    @endif
                    <span class="mb-0 text-decoration-none text-dark {{ $order->status_id == 6 ? 'text-muted' : 'text-dark' }}">{{$order->code}}</span>
                  </td>
                  <td class="{{ $order->status_id == 6 ? 'text-muted' : '' }}">
                    {{ $order->service->name }}
                    @if ($order->service_id == 1)
                        <br/>
                        {{$order->description}}
                    @endif
                    <br>
                    <small class="text-secondary">{{ $order->subservice_id ? $order->subservice->name : ''  }}</small>
                  </td>
                  <td class="{{ $order->status_id == 6 ? 'text-muted' : '' }}">{{$order->date.' '.$order->time}}</td>
                  <td class="{{ $order->status_id == 6 ? 'text-muted' : '' }}">
                    @switch($order->status_id)
                        @case(1)
                            Tertunda
                            @break
                        @case(2)
                            Dikonfirmasi
                            @break
                        @case(3)
                            Dilaksanakan
                            @break
                        @case(4)
                            Menunggu pembayaran
                            @break
                        @case(5)
                            Selesai
                            @break
                        @case(6)
                            Dibatalkan
                            @break
                        @default
                            Tertunda
                            @break
                    @endswitch
                  </td>
                  <td>
                    @if ($order->status_id < 6)
                    <a class="btn btn-danger btn-sm" href="/pesanan/{{ $order->code }}/batalkan">Batalkan</a>
                    @else
                    <button class="btn btn-danger btn-sm" disabled>Batalkan</button>
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