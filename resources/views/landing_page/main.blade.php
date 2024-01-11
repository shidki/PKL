<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="assets/landing_page/images/favicon.png" type="">

  <title>Balaikota</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="assets/landing_page/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="assets/landing_page/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="assets/landing_page/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/landing_page/css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="assets/landing_page/images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="">
            <span>
              Jogja Smart Service
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="customCarousel1">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#layanan">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#gedung">Gedung</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#lokasi">Location</a>
              </li>
              @auth
                  <li class="nav-item">
                    <a class="nav-link" href="#lokasi">Dashboard</a>
                  </li>
                  <li class="nav-item" id="login">
                    <a class="nav-link logout" href="/logout"> <i class="fa fa-user" aria-hidden="false"></i>Logout</a>
                  </li>
                @else
                  <li class="nav-item" id="login">
                    <a class="nav-link" href="/login"> <i class="fa fa-user" aria-hidden="false"></i> Login</a>
                  </li>
              @endauth
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <!-- Judul section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Pemerintah <br>
                      Kota Yogyakarta
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="assets/landing_page/images/logo_jogja.png" height="600px" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Pemerintah <br>
                      Kota Yogyakarta
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="assets/landing_page/images/logo_jogja.png" width="10px" height="500px" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Pemerintah <br>
                      Kota Yogyakarta
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="assets/landing_page/images/logo_jogja.png" width="10px" height="500px" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          {{-- <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li> --}}
        </ol>
      </div>

    </section>
  </div>

  {{-- Layanan Section --}}
  <section class="client_section layout_padding" id="layanan">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Layanan</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="assets/landing_page/images/wifi.png" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      FREE HOTSPOT
                    </h6>
                    <p>
                        Free Hotspot PEMKOT YOGYAKARTA 
                    </p>
                  </div>
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="assets/landing_page/images/bank.png" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                        Aset
                    </h6>
                    <p>
                        LAYANAN Pengelolaan Aset
                    </p>
                  </div>
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="assets/landing_page/images/kk.png" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      Data KK
                    </h6>
                    <p>
                        Layanan Perubahan Data KK
                    </p>
                  </div>
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="assets/landing_page/images/ktp.png" alt="" class="box-img">
              </div>
              <div class="detail-box">
                <div class="client_id">
                  <div class="client_info">
                    <h6>
                      KTP
                    </h6>
                    <p>
                        Layanan Permohonan KTP
                    </p>
                  </div>
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Gedung Section --}}
  
  <!-- service section -->

  <section class="service_section layout_padding" id="gedung">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Daftar <span>Gedung</span>
          </h2>
        </div>
        <div class="row">
          @foreach ( $gedung as $namaGedung )
            <div class="col-md-4 ">
              <div class="box ">
                <div class="img-box">
                  <img src="assets/landing_page/images/gedung.png" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                      {{ $namaGedung->nama }}
                  </h5>
                  <a href="" class="d-inline-block mt-2">
                    Detail <i class="fa fa-arrow-left"></i>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


  <!-- about section -->

  <section class="about_section layout_padding" id="lokasi">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2>
          Location
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9036986495103!2d110.38841372500508!3d-7.800019692220153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57f27388b60d%3A0xbff2e6188e98bdb6!2sBalai%20Kota%20Walikota%20YOGYAKARTA!5e0!3m2!1sid!2sid!4v1704944832669!5m2!1sid!2sid"
            width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            {{-- <a href="/3dmap">3dmap</a> --}}
            <iframe src="{{ route('3dmap') }}"
            width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="text-center">Not found? cek 3d map <a href="/3DmapBalaikota">Disini</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <div class="contact_link_box">
              <a href="https://maps.app.goo.gl/9UkUm6moGgNz1wmp9" target="_blank">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <span>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  kominfosandi@jogjakota.go.id
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <span id="displayYear" style="display: none;"></span>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Email
          </h4>
          
          <form action="#">
            <input type="text" placeholder="Enter email" id="msg"/>
            <button type="submit" id="btn_email">
              Send Email
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- jQery -->
  <script type="text/javascript" src="assets/landing_page/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="assets/landing_page/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="assets/landing_page/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>