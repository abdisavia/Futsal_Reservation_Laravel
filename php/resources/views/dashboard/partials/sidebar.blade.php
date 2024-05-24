<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse mt-3">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/penyewaan*') ? 'active' : '' }}" href="/dashboard/penyewaan">
            <span data-feather="file" class="align-text-bottom"></span>
            Penyewaan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/lapangan*') ? 'active' : '' }}" href="/dashboard/lapangan">
            <span data-feather="shopping-cart " class="align-text-bottom"></span>
            Lapangan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/laporan') ? 'active' : '' }}" href="/dashboard/laporan">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Laporan Bulanan
          </a>
        </li>
  </nav>