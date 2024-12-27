@extends('layouts.client')
@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="mb-4">
                        PENS <br>
                        SKYVENTURE <br>
                        <span class="accent-text">Business Incubator</span>
                    </h1>
        
                    <p class="mb-4 mb-md-5">
                        PENS Sky Venture adalah inkubator bisnis PENS yang mendukung pengembangan wirausaha bagi civitas akademika dan masyarakat.
                    </p>
        
                    <div class="hero-buttons">
                        <a href="https://www.youtube.com/watch?v=iy9j4877RTs&t=165s" class="btn btn-link mt-2 mt-sm-0 glightbox">
                            <i class="bi bi-play-circle me-1"></i>
                            Play Video
                        </a>
                    </div>
                </div>
            </div>
        
            <!-- Hero Image Slider -->
            <div class="col-lg-5">
              <div id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500" data-aos="zoom-out" data-aos-delay="300">
                  <div class="carousel-inner">
                      <!-- Event Images -->
                      @foreach($event as $index => $eventItem)
                          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                              <img src="{{ asset('storage/img/events/' . $eventItem->image) }}" alt="Event Image {{ $index + 1 }}" class="d-block w-100 img-fluid rounded">
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>Event</h5>
                                  <p>{{ $eventItem->event_name }}</p>
                              </div>
                          </div>
                      @endforeach
              
                      <!-- News Images -->
                      @foreach($news as $index => $newsItem)
                          <div class="carousel-item">
                              <img src="{{ asset('storage/img/news/' . $newsItem->image) }}" alt="News Image {{ $index + 1 }}" class="d-block w-100 img-fluid rounded">
                              <div class="carousel-caption d-none d-md-block">
                                  <h5>News</h5>
                                  <p>{{ $newsItem->news_title }}</p>
                              </div>
                          </div>
                      @endforeach
                  </div>
          
                  <!-- Controls -->
                  <a class="carousel-control-prev" href="#heroSlider" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#heroSlider" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                  </a>
              </div>
          </div>
        </div>
        

        <div class="row stats-row gy-4 mt-5 justify-content-between text-center" data-aos="fade-up" data-aos-delay="500">
          <!-- Stat 1 -->
          <div class="col-lg-3 col-md-6">
              <div class="stat-item shadow p-4 rounded bg-white hover-bg-primary">
                  <div class="stat-icon mb-3">
                      <i class="bi bi-trophy fs-1 text-primary"></i>
                  </div>
                  <div class="stat-content">
                      <h4 class="fw-bold">10 Penghargaan</h4>
                      <p class="text-muted">Prestasi luar biasa yang kami raih</p>
                  </div>
              </div>
          </div>
          
          <!-- Stat 2 -->
          <div class="col-lg-3 col-md-6">
              <div class="stat-item shadow p-4 rounded bg-white hover-bg-primary">
                  <div class="stat-icon mb-3">
                      <i class="bi bi-briefcase fs-1 text-success"></i>
                  </div>
                  <div class="stat-content">
                      <h4 class="fw-bold">{{ $tenant_count }} Tenant</h4>
                      <p class="text-muted">Tenant yang berkembang bersama kami</p>
                  </div>
              </div>
          </div>
          
          <!-- Stat 3 -->
          <div class="col-lg-3 col-md-6">
              <div class="stat-item shadow p-4 rounded bg-white hover-bg-primary">
                  <div class="stat-icon mb-3">
                      <i class="bi bi-building fs-1 text-danger"></i>
                  </div>
                  <div class="stat-content">
                      <h4 class="fw-bold">{{ $facility_count }} Fasilitas</h4>
                      <p class="text-muted">Infrastruktur modern untuk mendukung inovasi</p>
                  </div>
              </div>
          </div>
      </div>
        

      </div>

    </section><!-- /Hero Section -->

    <section id="event" class="features-cards section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Event Terbaru</h2>
      </div>
    
      <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
          <!-- Event 1 -->
          @foreach ($event as $eventItem)
          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box text-center p-4" style="background-color: #fff8e6; border: 1px solid #ddd; border-radius: 8px; transition: transform 0.3s ease;">
              <div class="feature-image mb-3" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                <img src={{'storage/img/events/'.$eventItem->image}} alt="Logo PENS" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
              <h4 class="feature-title mb-3">{{ $eventItem->event_name }}</h4>
            </div>
          </div>
          @endforeach
        </div>
      
        <!-- Link to View All Events -->
        <div class="text-center mt-4" data-aos="fade-up">
          <a href="{{route('events')}}" class="btn btn-primary btn-lg">
            Lihat Semua Event
          </a>
        </div>
      </div>
      
    </section>
    <!-- /Features Cards Section -->

    <!-- Features Section -->
    <section id="tentang" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kami</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="d-flex justify-content-center">

          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                <h4>General</h4>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                <h4>Visi Misi</h4>
              </a><!-- End tab nav item -->

            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                <h4>Struktural</h4>
              </a>
            </li><!-- End tab nav item -->

          </ul>

        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <p class="fst-italic">
                  PENS Sky Venture adalah inkubator bisnis milik kampus Politeknik Elektronika Negeri Surabaya (PENS) yang berperan aktif dalam melayani pengembangan bisnis dan wirausaha dari civitas akademia PENS serta masyarakat umum. Program kegiatan kami diantaranya coaching dan mentoring bisnis, workshop kewirausahaan, pendampingan usaha, bisnis matching and pitching, serta pengembangan usaha baru. Inkubator bisnis ini berdiri pada tahun 2015 dan sudah bergabung dalam anggota Asosiasi Inkubator Bisnis Indonesia (AIBI). Saat ini PENS Sky Venture telah membina lebih dari 50 startup yang 34 diantaranya telah mendapat pendanaan dari Badan Riset Inovasi Nasional (BRIN) lewat program CPPBT (pra-startup), PPBT (startup), maupun startup scaleup. PENS Sky Venture juga masuk dalam salah satu inkubator bisnis terbaik pilihan Asian Development Bank(ADB). Tahun 2022 PENS Sky Venture dinobatkan sebagai juara 1 inkubator dengan fasilitas dan pembinaan terbaik dari Pemerintah Kota Surabaya.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="https://skyventure.pens.ac.id/assets/img/about.jpeg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>Visi</h3>
                <p class="fst-italic">
                  Menjadi pusat inkubator bisnis berbasis teknologi tepat guna yang unggul dan mandiri, guna mendorong lahirnya technopreneur di Indonesia
                </p>
                <h3>Misi</h3>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Melayani, memberikan fasilitas dan membantu pengembangan bisnis ide inovatif berbasis teknologi , agar menjadi produk unggulan dan bisa diterima di pasar nasional dan internasional.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Mengembangkan budaya kewirausahaan untuk mahasiswa dosen , alumni dan masyarakat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Mengembangkan jaringan antara stakeholders terkait untuk bersama sama mendorong lahirnya technopreneur di Indonesia.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="https://skyventure.pens.ac.id/assets/img/blog/Snapinsta.app_409218966_870330831501360_3811131583468783151_n_1080.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
                <!-- Deskripsi Struktur -->
                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                    <h3>Struktur Organisasi PENS SKY Venture</h3>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Direktur: Aliridho Barakbah</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Wakil Direktur: Amang Sudarsono</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Ketua Unit Inkubator Bisnis: Mochamad Mobed B</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Manager PENS SKY Venture: Naufal Rasyiq</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Sekretaris: Wahyu Agung Setiawan</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Asisten Manager:
                            <ul>
                                <li>Pra Startup: Maretha Ruswiansari</li>
                                <li>Startup: Aji Sapta Pramulen</li>
                                <li>Scaleup: Afifah Dwi Ramadhani</li>
                            </ul>
                        </span></li>
                    </ul>
                </div>
                <!-- Gambar Struktur -->
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                    <img src="https://skyventure.pens.ac.id/assets/img/structure2.png" alt="Struktur Organisasi" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- End tab content item -->

        </div>

      </div>

    </section><!-- /Features Section -->
                
    <!-- Features Cards Section -->
    <section id="berita" class="features-cards section">
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-center">Berita Terbaru</h2>
      </div>
    
      <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
          @foreach ($news as $newsItem)
          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box text-center p-4" style="background-color: #fff8e6; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
              <div class="feature-image mb-3" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 8px;">
                <img src="{{'storage/img/news/'.$newsItem->image}}" alt="Logo PENS" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
              </div>
              <h4 class="feature-title mb-3" style="color: #333; font-weight: 600;">{{$newsItem->news_title}}
              </h4>
              <a href="" style="color: #ff6600; font-weight: 500; text-decoration: none; transition: color 0.3s ease;">Baca Selengkapnya</a>
            </div>
          </div>
          @endforeach
        </div>
    
        <div class="text-center mt-4" data-aos="fade-up">
          <a href="{{route('news')}}" class="btn btn-primary btn-lg" style="background-color: #ff6600; border: none; padding: 12px 24px; border-radius: 8px; transition: background-color 0.3s ease;">
            Lihat Semua Berita
          </a>
        </div>
      </div>
    </section>
    
    <style>
      .feature-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      }
    
      .feature-box:hover .feature-image img {
        transform: scale(1.1);
      }
    
      .feature-box a:hover {
        color: #ff4500;
      }
    
      .btn-primary:hover {
        background-color: #e65c00;
      }
    </style>

<section id="clients" class="clients section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Tenant Kami</h2>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>
      <div class="swiper-wrapper d-flex justify-content-center align-items-center">
        @foreach ($tenant as $tenantItem)
        <div class="swiper-slide text-center">
            <img src="{{ asset('storage/img/tenants/'.$tenantItem->image) }}" class="img-fluid" alt="">
        </div>
        @endforeach
    </div>
    
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section>
@endsection