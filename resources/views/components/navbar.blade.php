<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img class="me-2" src="/logo.png" height="28" alt="">
      <span class="fw-bolder" style="color: #3190e3">Smartcare</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="me-auto"></div>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/pesanan">Pesanan</a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/profil">{{ Auth::user()->name }}</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link btn px-3 btn-primary text-light ms-3" aria-current="page" href="/login">Masuk</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>