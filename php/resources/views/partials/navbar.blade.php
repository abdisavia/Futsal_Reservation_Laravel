<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-lg">
      <a class="navbar-brand d-flex  align-items-center" href="/">
        <img src="../Img/Logo_Fix.png" alt="Logo Goeboex Futsal" width="50" class="me-2" >
        <h1 class="fw-bold fs-5 logoText">Goeboex<br>Futsal</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home#heroSection">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home#lapSection">Lapangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home#lokJaSection">Lokasi & Jam Buka</a>
          </li>
          <li class="nav-item me-2">
            <a class="nav-link" href="/home#cont">Contact</a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/home">Home</a></li>
              <li><a class="dropdown-item" href="/menyewa">Booking Saya</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                <button type="submit" class="dropdown-item">Log Out</button>
              </form>
            </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="../login"><button class="btn rounded-pill w-100 px-4 btn-login" type="button">Login</button></a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>