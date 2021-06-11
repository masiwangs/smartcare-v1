<div class="row mb-5">
  <div class="col-3">
    <div class="card border-0 shadow">
      <div class="card-body">
        <div class="text-center mb-4">
          <img class="rounded-circle mb-3" src="/rescue.jpg" width="100" height="100" alt="">
          <h5 class="fw-light">{{ Auth::user()->name }}</h5>
          <p>{{ Auth::user()->email }}<br />{{ Auth::user()->phone }}</p>
        </div>
        <div class="nav flex-column nav-pills" aria-orientation="vertical">
          <button wire:click="$set('view', 'profile')" class="nav-link {{ $view == 'profile' ? 'active' : ''}}">Informasi Akun</button>
          <button wire:click="$set('view', 'security')" class="nav-link {{ $view == 'security' ? 'active' : ''}}">Keamanan</button>
          <a href="/logout" class="nav-link btn bg-danger text-white">Keluar</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6">
    @if ($view == 'profile')
    <div class="card border-0">
      <div class="card-body w-100">
        <p class="h1 fw-light mb-4">Ubah informasi akun</p>
        <form action="/profil" method="POST">
          @csrf
          <div class="mb-3 row">
            <label for="inputName" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputName" name="name" value="{{ Auth::user()->name }}">
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputGender" class="col-sm-4 col-form-label">Jenis kelamin</label>
            <div class="col-sm-8">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" {{ Auth::user()->gender == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" {{ Auth::user()->gender == 2 ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
            </div>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputBirthdate" class="col-sm-4 col-form-label">Tanggal lahir</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="inputBirthdate" placeholder="hh/bb/tttt" name="birthdate" value="{{ Auth::user()->birthdate }}">
            </div>
            @error('birthdate')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="inputEmail" name="email" value="{{ Auth::user()->email }}">
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputPhone" class="col-sm-4 col-form-label">HP</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="inputPhone" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            @error('phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    @else
    <div class="card border-0">
      <div class="card-body w-100">
        <p class="h1 fw-light mb-4">Ubah keamanan akun</p>
        <div>
          <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Password lama</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="inputPassword" wire:model="old_password" placeholder="******">
            </div>
            @error('old_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputNewPassword" class="col-sm-4 col-form-label">Password baru</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="inputNewPassword" wire:model="password" placeholder="Min. 6 karakter">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="inputNewPasswordConfirm" class="col-sm-4 col-form-label">Konfirmasi password baru</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="inputNewPasswordConfirm" wire:model="password_confirm">
            </div>
            @error('password_confirm')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          @if (\Session::has('message'))
          <p class="mb-0">{{ \Session::get('message') }}</p>
          @endif
          <div class="mt-4 d-flex justify-content-end">
            <button wire:click="update_password" class="btn btn-primary">Simpan</button>
          </div>
          @if ($success)
              Berhasil
          @endif
        </div>
      </div>
    </div>
    @endif
  </div>
</div>