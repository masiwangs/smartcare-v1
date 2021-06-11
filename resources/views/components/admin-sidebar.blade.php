<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/administrator" class="brand-link">
    <span class="brand-text font-weight-light">Admin Smartcare</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-3">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 mb-4">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/administrator" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">PESANAN</li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=1" class="nav-link">
            <i class="nav-icon fas fa-star"></i>
            <p>
              Baru
              @if ($pesanan_baru_count > 0)
              <span class="badge badge-info right">{{ $pesanan_baru_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=2" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
              Dikonfirmasi
              @if ($pesanan_dikonfirmasi_count > 0)
              <span class="badge badge-info right">{{ $pesanan_dikonfirmasi_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=3" class="nav-link">
            <i class="nav-icon fas fa-stethoscope"></i>
            <p>
              Dilaksanakan
              @if ($pesanan_dilaksanakan_count > 0)
              <span class="badge badge-info right">{{ $pesanan_dilaksanakan_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=4" class="nav-link">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
            <p>
              Menunggu pembayaran
              @if ($pesanan_menunggu_pembayaran_count > 0)
              <span class="badge badge-info right">{{ $pesanan_menunggu_pembayaran_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=5" class="nav-link">
            <i class="nav-icon fas fa-check-double"></i>
            <p>
              Selesai
              @if ($pesanan_selesai_count > 0)
              <span class="badge badge-info right">{{ $pesanan_selesai_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/pesanan?status=6" class="nav-link">
            <i class="nav-icon fas fa-times-circle"></i>
            <p>
              Gagal
              @if ($pesanan_dibatalkan_count > 0)
              <span class="badge badge-danger right">{{ $pesanan_dibatalkan_count }}</span>
              @endif
            </p>
          </a>
        </li>
        <li class="nav-header">LAYANAN</li>
        <li class="nav-item">
          <a href="/administrator/layanan" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Daftar layanan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/administrator/layanan-statistik" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Statistik layanan
            </p>
          </a>
        </li>
        <li class="nav-header">ADMIN</li>
        <li class="nav-item">
          <a href="/administrator/admin" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
              Daftar Admin
              <span class="badge badge-info right">{{ $admin_count }}</span>
            </p>
          </a>
        </li>
        <li class="nav-header">USER</li>
        <li class="nav-item">
          <a href="/administrator/user" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Daftar User
              <span class="badge badge-info right">{{ $user_count }}</span>
            </p>
          </a>
        </li>
        <li class="nav-header">BANTUAN</li>
        <li class="nav-item">
          <a href="/administrator/bantuan" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Bantuan
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>