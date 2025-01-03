<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PENS SKYVENTURE - Your Innovation Hub</title> <!-- Menambahkan Logo dan Teks dalam title -->
  <meta name="description" content="PENS SKYVENTURE - A platform for innovation and creativity at Politeknik Elektronika Negeri Surabaya.">
  <meta name="keywords" content="PENS, SKYVENTURE, Politeknik Elektronika, innovation, startup, technology">

<!-- Favicons -->
<link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> <!-- Ganti dengan path ke logo -->

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="icon" type="image/jpeg" href="{{ asset('assets/images/logo/skyventure.png') }}">

<!-- Vendors CSS Files -->
<link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Main CSS File -->
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

</head>


<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    
      <!-- Logo -->
      <div class="d-flex align-items-center">
        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0 text-decoration-none">
          <img src={{asset("assets/images/logo/logo-pens.png")}} alt="Logo PENS" class="logo-img">
        </a>
        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0 text-decoration-none">
            <img src={{asset("assets/images/logo/skyventure.png")}} alt="Logo PENS" class="logo-img">
        </a>
      </div>
      
      
    
      <!-- Navigation -->
      <nav id="navmenu" class="navmenu">
        <ul class="d-flex align-items-center">
          <li><a href="/" class="nav-link active">Home</a></li>
          <li><a href="{{route('events')}}" class="nav-link">Event</a></li>
          <li><a href="{{route('news')}}" class="nav-link">Berita</a></li>
          <li><a href="{{route('tenants')}}" class="nav-link">Tenant</a></li>
          <li><a href="{{route('facilities')}}" class="nav-link">Fasilitas</a></li>
          <li><a href="{{route('download')}}" class="nav-link">Download</a></li>
          <!-- Login Button -->
          <!-- <li><a href="#login" class="btn btn-outline-primary rounded-pill ms-3 px-4">Login</a></li> -->
        </ul>
      </nav>
      
      <!-- Mobile Toggle Button -->
      <i class="mobile-nav-toggle d-xl-none bi bi-list text-dark fs-3"></i>
    </div>
  
    <!-- Mobile Nav Menu (Hidden on desktop) -->
    <div class="mobile-nav d-xl-none">
      <ul>
            <li><a href="/" class="nav-link active">Home</a></li>
          <li><a href="{{route('events')}}" class="nav-link">Event</a></li>
          <li><a href="{{route('news')}}" class="nav-link">Berita</a></li>
          <li><a href="{{route('tenants')}}" class="nav-link">Tenant</a></li>
          <li><a href="{{route('facilities')}}" class="nav-link">Fasilitas</a></li>
          <li><a href="{{route('download')}}" class="nav-link">Download</a></li>
      </ul>
    </div>
  </header>
  
  

  <main class="main">
    @yield('content')    
  </main>

  <footer class="footer bg-light text-dark pt-5 pb-3 mt-5" id="contact">
    <div class="container">
        <div class="row">
            <!-- Lokasi -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase fw-bold mb-3"><i class="bi bi-geo-alt-fill"></i> Lokasi</h5>
                <p>
                    Gedung EIC Lantai 3<br>
                    Politeknik Elektronika Negeri Surabaya<br>
                    Jl. Raya ITS Sukolilo Kampus PENS<br>
                    Surabaya
                </p>
            </div>

            <!-- Kontak dan Media Sosial -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase fw-bold mb-3"><i class="bi bi-envelope-fill"></i> Hubungi Kami</h5>
                <p><strong>Email:</strong> <a href="mailto:penssky.inkubator@div.pens.ac.id" class="text-decoration-none text-dark">penssky.inkubator@div.pens.ac.id</a></p>
                <p><strong>Instagram:</strong> <a href="https://www.instagram.com/pensskyventure" target="_blank" class="text-decoration-none text-dark">@pensskyventure</a></p>
                <p><strong>Youtube:</strong> <a href="https://www.youtube.com/channel/PENSSKY" target="_blank" class="text-decoration-none text-dark">PENS SKY Venture</a></p>
                <p><strong>Call:</strong> <a href="tel:085732570257" class="text-decoration-none text-dark">085732570257</a></p>
            </div>

            <!-- Tambahan: Peta atau Informasi Tambahan -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase fw-bold mb-3"><i class="bi bi-info-circle-fill"></i> Tentang Kami</h5>
                <p>
                  PENS Sky Venture adalah inkubator bisnis PENS yang mendukung pengembangan wirausaha bagi civitas akademika dan masyarakat                </p>
                <div class="d-flex gap-3">
                    <a href="https://www.instagram.com/pensskyventure" target="_blank" class="text-dark fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/PENSSKY" target="_blank" class="text-dark fs-4"><i class="bi bi-youtube"></i></a>
                    <a href="mailto:penssky.inkubator@div.pens.ac.id" class="text-dark fs-4"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
        </div>

        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">© 2024 PENS SKY Venture. All rights reserved.</p>
        </div>
    </div>
</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendors JS Files -->
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendors/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/purecounter/purecounter_vanilla.js') }}"></script>


  <!-- Main JS File -->
  <script src={{asset('assets/js/frontend/main.js')}}></script>

</body>

</html>