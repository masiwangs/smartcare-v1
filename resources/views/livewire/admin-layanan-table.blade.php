<form wire:submit.prevent="save" class="table-responsive">
  <table class="table table-head-fixed table-hover">
    <thead>
      <tr>
        <th>Nama layanan</th>
        <th style="width:5rem" class="text-nowrap">Layanan Tersedia</th>
        <th style="width:5rem" class="text-nowrap">Terima Homevisit</th>
        <th style="width:5rem" class="text-nowrap">Pesanan baru</th>
        <th style="width:5rem" class="text-nowrap">Total Pesanan</th>
        <th style="width: 3rem">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($subservices as $index => $subservice)
      <tr wire:key="subservice-fielt-{{ $subservice->id }}">
        <td>
          {{ $subservice->name }}<br/>
          <small class="text-secondary">{{ $subservice->description }}</small><br/>
          <a href="/administrator/layanan/{{ $subservice->slug }}"><small>Lihat detail</small></a>
        </td>
        <td>
          <select class="form-control" wire:model="subservices.{{ $index }}.is_available" aria-label="Default select example">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
          </select>
        </td>
        <td>
          <select class="form-control" wire:model="subservices.{{ $index }}.is_homevisitable" aria-label="Default select example">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
          </select>  
        </td>
        <td class="text-center">{{ \App\Models\Order::where('subservice_id', $subservice->id)->where('status_id', 1)->count() }}</td>
        <td class="text-center">{{ \App\Models\Order::where('subservice_id', $subservice->id)->where('status_id', 1)->count() }}</td>
        <td>
          <button type="submit" class="btn btn-sm btn-success">Simpan</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</form>