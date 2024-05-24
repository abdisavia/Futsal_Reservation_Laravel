@extends('layouts/main')
@section('container')

    <!-- Hero Section -->
    <section class="heroSection align-items-center " id="heroSection">
      <div class="container hidden contHero">
        <h2 class="text-white  text-selamatDatang">Selamat Datang di</h2>
        <h1 class="text-red fw-bold text-GoeboexFutsal">GOEBOEX <span class="text-white text-Futsal">FUTSAL</span></h1>
        @auth
        @else
        <a class="btn-Register" href="/register">Registerasi</a>
        @endauth
      </div>
    </section>

    <!-- Lapangan Section -->
    <section class="lapanganSection " id="lapSection">
      <div class="container hidden">
        <div class="row">
          <h1 class="text-red judul pt-5 ">LAPANGAN</h1>
        </div>
        <div class="row pt-5">
          <swiper-container class="mySwiper" keyboard="true" space-between="30" pagination="true" pagination-clickable="true"
          navigation="true">
          <swiper-slide class="d-flex justify-content-center">
            @foreach ($Lapangan as $futsal)
            <div class="card me-5" style="width: 25rem;">
              <div class=" d-flex justify-content-center">
                <img src="../Img/izuddin-helmi-adnan-K5ChxJaheKI-unsplash.jpg" class="card-img-top lapanganCardImg" alt="Lapangan 1">
              </div>
              <div class="card-body">
                <h5 class="card-title">Lapangan {{ $futsal->nama }}</h5>
                <a href="../jadwal/{{ $futsal->id }}" class="btn btn-red d-flex align-items-center ">
                  <svg width="15" height="15" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                    <circle cx="43.5" cy="43.5" r="43.5" fill="white"/>
                    <path d="M50.2667 61.8924L34.8602 46.4859C33.0407 44.6664 33.0407 41.6891 34.8602 39.8696L50.2667 24.4631" stroke="#EC3435" stroke-width="16" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  Lihat Jadwal
                </a>
              </div>
            </div>  
            @endforeach
          </swiper-slide>
          </swiper-container>
        </div>
      </div>
    </section>


    <!-- Lokasi & jambuka section -->
    <section class="jambuka " id="lokJaSection">
      <div class="container hidden">
        <h1 class=" text-red mt-5 pt-5 judul text-center position-relative mb-3">Lokasi & Jam buka</h1>
          <div class="row  d-flex align-items-center w-75 mx-auto  position-relative">
            <div class="col px-auto gMapsFrames">
              <iframe class="gMapsFrame rounded border-red" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.162042713908!2d110.40251727430595!3d-7.772635777103702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59952124c49f%3A0xa4958bde5acb3c42!2sGoeboex%20Futsal!5e0!3m2!1sen!2sid!4v1683348699129!5m2!1sen!2sid" width="419px" height="450px" style="border:2;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col jamb text-center text-white">
              <div class="ms-5 ps-5">
              <h4 class="my-3">Jam Buka</h4>
              <ul class="text-start" style="padding:0">
                <li class="d-flex"><div class="col">Senin</div><div class="col">:</div><div class="col ">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Selasa</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Rabu</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Kamis</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Jumat</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Sabtu</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
                <li class="d-flex"><div class="col">Minggu</div><div class="col">:</div><div class="col">07:00 - 13:00</div></li>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
    