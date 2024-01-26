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
  <link rel="shortcut icon" href="{{asset('assets/landing_page/images/favicon.png') }}" type="">

  <title>{{ $gedungDetails->nama }}</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing_page/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link href="{{ asset('assets/landing_page/css/font-awesome.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/landing_page/css/responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/landing_page/css/detail.css') }}" rel="stylesheet" />
</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="{{ asset('assets/landing_page/images/hero-bg.png') }}" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand nav-link" id="back" href="/">
            <span>
              <i class="fa fa-arrow-left"><span class="d-inline-block ml-3">Back</span></i>
            </span>
          </a>
          </button>
        </nav>
      </div>
    </header>
  </div>


  <div class="deskripsi">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="{{ asset('assets/landing_page/images/rimuru_nikki.jpg')}}" alt="" style="max-width: 100px;">
              </div>
              <h4>{{ $gedungDetails->nama }}</h4>
              <p class="mt-5 text-justify">{{ $gedungDetails->deskripsi }}</p>
            </div>
          </a>
        </div>
      </div>
    </div>
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
          @foreach ($layanan as $layanan )
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <div class="client_id">
                    <div class="client_info">
                      <h6>
                        Layanan {{ $loop->iteration }}
                      </h6>
                      <p>
                        {{ $layanan->nama }}
                      </p>
                    </div>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <section class="about_section layout_padding" id="lokasi">
    <div class="container  ">
      <div class="heading_container heading_center mb-5">
        <h2>
          Lokasi
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          @if ($gedungDetails->maps !== null )
          <div class="img-box">
            <iframe src="{{ $gedungDetails->maps }}"
            width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          @else
          <div class="col-md-12 ">
            <div class="img-box text-center">
              <i class="fa fa-exclamation-triangle" style="font-size: 150px; color: red;"></i>
              <h3><strong style="color: red;">Lokasi belum tersedia</strong></h3>
            </div>
          </div>
          @endif
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
                <span id="displayYear" style="display: none;"></span>
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
  <script type="text/javascript" src="{{ asset('assets/landing_page/js/jquery-3.4.1.min.js') }}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="{{ asset('assets/landing_page/js/bootstrap.js') }}"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="{{ asset('assets/landing_page/js/custom.js') }}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>