<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/landing_page/1/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/landing_page/1/assets/css/fontawesome.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/landing_page/1/assets/css/templatemo-lugx-gaming.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/landing_page/1/assets/css/owl.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/landing_page/1/assets/css/animate.css' )}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="{{ asset('assets/landing_page/css/style.css' )}}" rel="stylesheet" />

</head>

<body>

    {{-- <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ $penginapan->nama }}</h3>
                    <span class="breadcrumb"><a href="/"><strong>Beranda</strong></a> >  {{ $penginapan->nama }}</span>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="hero_area">
        <div class="hero_bg_box"  style="background-image: url({{ asset("assets/landing_page/images/balkot2.jpg")}}); background-size: 100vw 100vh;">
          <div class="bg_img_box">
            <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop><stop stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,294L48,269.5C96,245,192,196,288,220.5C384,245,480,343,576,359.3C672,376,768,310,864,310.3C960,310,1056,376,1152,343C1248,310,1344,180,1440,114.3C1536,49,1632,49,1728,57.2C1824,65,1920,82,2016,73.5C2112,65,2208,33,2304,89.8C2400,147,2496,294,2592,294C2688,294,2784,147,2880,114.3C2976,82,3072,163,3168,212.3C3264,261,3360,278,3456,277.7C3552,278,3648,261,3744,277.7C3840,294,3936,343,4032,359.3C4128,376,4224,359,4320,359.3C4416,359,4512,376,4608,318.5C4704,261,4800,131,4896,81.7C4992,33,5088,65,5184,106.2C5280,147,5376,196,5472,228.7C5568,261,5664,278,5760,302.2C5856,327,5952,359,6048,375.7C6144,392,6240,392,6336,359.3C6432,327,6528,261,6624,245C6720,229,6816,261,6864,277.7L6912,294L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z"></path></svg>
          </div>
        </div>
        <header class="header_section" >
            <div class="container-fluid">
              <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand nav-link" id="back" href="/detail/{{ $gedung }}">
                  <span style="text-shadow: 0px 3px 3px rgb(31, 31, 31);text-transform: capitalize">
                    <i class="fa fa-angle-left"></i><span class="d-inline-block" style="margin-left: 20px;">Back</span>
                  </span>
                </a>
                </button>
              </nav>
            </div>
          </header>
        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-shadow: 0px 3px 3px rgb(31, 31, 31);text-transform: capitalize">
                        <h3>{{ $layanan->nama }}</h3>
                        <span class="breadcrumb"><a href="/"><strong>Beranda</strong></a> > <a href="/detail/{{ $gedung }}"><strong>{{ $gedung }}</strong></a> >  {{ $layanan->nama }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-image">
                        @if ($layanan->judul_gambar !== null)
                            <h3 class="mb-4">{{ $layanan->judul_gambar }}</h3>
                        @endif
                        @if ($layanan->gambar_detail !== null)
                        <img height="500px" src="{{ asset("$layanan->gambar_detail")}}" alt="">
                      {{-- @else
                        <div class="text-center" style="width: 500px;margin:auto; padding: 50px; border: 0.5px solid red;margin-top: -200px;">
                            <i class="fa fa-exclamation-triangle" style="font-size: 50px; color: red;"></i>
                            <h3><strong style="color: red;font-size: 15px;">belum tersedia</strong></h3>
                        </div> --}}
                      @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="sep"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="more-info mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item text-center" role="presentation">
                                        <button class="nav-link active text-center" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true" style="text-transform: capitalize;">{{ $layanan->nama }}</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane  fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <pre class="text-justify" style="white-space: pre-wrap;">{{ $layanan->deskripsi}}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/landing_page/1/assets/landing_page/1/vendor/jquery/jquery.min.js' )}}"></script>
    <script src="{{ asset('assets/landing_page/1/assets/landing_page/1/vendor/bootstrap/js/bootstrap.min.js' )}}"></script>
    <script src="{{ asset('assets/landing_page/1/assets/js/isotope.min.js' )}}"></script>
    <script src="{{ asset('assets/landing_page/1/assets/js/owl-carousel.js' )}}"></script>
    <script src="{{ asset('assets/landing_page/1/assets/js/counter.js' )}}"></script>
    <script src="{{ asset('assets/landing_page/1/assets/js/custom.js' )}}"></script>

</body>

</html>