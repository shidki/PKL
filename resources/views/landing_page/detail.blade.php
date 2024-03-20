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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>{{ $gedungDetails->nama }}</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing_page/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link href="{{ asset('assets/landing_page/css/font-awesome.min.css') }}" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('assets/landing_page/css/responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/landing_page/css/detail.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-WT8EouLJXxKoIqTqf7GDgNjt8WRhdZLUpQmN5xpPFjsjIzpuOq/F7MqhYI0ySa2yayWVd7xgQrQF3crNEauFEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
.deskripsi_layanan_btn:hover{
  color: blue;
}

  </style>
</head>

<body>
  <div class="modal fade" id="deskripsi_layanan_container" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Deskripsi Layanan <strong><span id="nama_dinas_modal2"></span></strong></h5>
            </div>
                <pre class="modal-body" id="deskripsi_layanan">
                    
                </pre>
                <img width="90%;" style="margin: auto;" src="{{ asset("$gedungDetails->gambar")}}" alt="">
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END POP UP --}}
  <div class="hero_area">
    <div class="hero_bg_box"   style="background-image: url({{ asset("assets/landing_page/images/balkot2.jpg")}}); background-size: 100vw 100vh;">
      <div class="bg_img_box" style="margin-bottom: -150px;">
        <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop><stop stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,294L48,269.5C96,245,192,196,288,220.5C384,245,480,343,576,359.3C672,376,768,310,864,310.3C960,310,1056,376,1152,343C1248,310,1344,180,1440,114.3C1536,49,1632,49,1728,57.2C1824,65,1920,82,2016,73.5C2112,65,2208,33,2304,89.8C2400,147,2496,294,2592,294C2688,294,2784,147,2880,114.3C2976,82,3072,163,3168,212.3C3264,261,3360,278,3456,277.7C3552,278,3648,261,3744,277.7C3840,294,3936,343,4032,359.3C4128,376,4224,359,4320,359.3C4416,359,4512,376,4608,318.5C4704,261,4800,131,4896,81.7C4992,33,5088,65,5184,106.2C5280,147,5376,196,5472,228.7C5568,261,5664,278,5760,302.2C5856,327,5952,359,6048,375.7C6144,392,6240,392,6336,359.3C6432,327,6528,261,6624,245C6720,229,6816,261,6864,277.7L6912,294L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z"></path></svg>
      </div>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand nav-link" id="back" href="/" >
            <span style="text-shadow: 0px 3px 3px rgb(31, 31, 31);text-transform: capitalize">
              <i class="fa fa-angle-left"><span class="ml-3">Back</span></i>
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
                @if ($gedungDetails->gambar !== "")
                <img style="width: 200px;max-height: 150px; margin-left: -50px; margin-bottom: 100px;" src="{{ asset("$gedungDetails->gambar")}}" alt="">
              @else
                {{-- <img height="200px" src="{{ asset('assets/landing_page/1/assets/images/kamar.jpeg')}}" alt="Penginapan"> --}}
                <div class="text-center" style="width: 300px; margin-left: -100px; border: 0.5px solid red;">
                  <i class="fa fa-exclamation-triangle" style="font-size: 50px; color: red;"></i>
                  <h3><strong style="color: red;font-size: 15px;">Gambar belum tersedia</strong></h3>
                </div>
              @endif
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
                      <a href="{{  route('detail_layanan' ,['id' => $layanan->id, 'nama' => $gedungDetails->nama ]) }}"><i id="icon_deskripsi" class="fa fa-search"></i><span class="ml-2">Detail</span></a>
                      {{-- <button type="submit" data-bs-toggle="modal" data-bs-target="#deskripsi_layanan_container" name="deskripsi_layanan"  data-id="{{ json_encode(['deskripsi' => $layanan->deskripsi,'id_layanan' => $layanan->id, 'nama' => $layanan->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit layanan" class="deskripsi_layanan_btn">
                        <i id="icon_deskripsi" class="fa fa-search"></i><span class="ml-2">Detail</span>
                      </button> --}}
                      {{-- <button onclick="toggleDeskripsi(this)" class="button_deskripsi" style="border: none;background: transparent;"><i id="icon_deskripsi" class="fa fa-plus"></i><span class="ml-2">Deskripsi</span></button>
                      <pre style="display: none" class="deskripsi_layanannnn">{{ $layanan->deskripsi }}</pre> --}}
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
          <div style="text-transform: capitalize;" class=""><strong style="color: black">Petunjuk</strong> :
          <ul type="circle" class="">
            <li>Klik tanda panah yang sudah tersedia di 3d map diatas untuk petunjuk jalan</li>
            <li><div class="" style="">Map bisa digeser</div></li>
          </ul>
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
            {{-- <h4>
              Judul
            </h4> --}}
            <div class="contact_link_box">
              {{-- <a href="https://maps.app.goo.gl/xWiBnKzDdnt6AuMv9">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a> --}}
              <a href="https://wa.me/081325835578" target="_blank">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                <span>
                  +6281325835578
                </span>
              </a>
              <span id="displayYear" style="display: none;"></span>

              <a href="mailto:ridwanshidki7@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  ridwanshidki7@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div> --}}
        <div class="col-md-12 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Sosial Media
            </h4>
            <div class="info_links">
              <a class="active" href="https://www.instagram.com/ridwan_shidkii">
                <i class="fa fa-instagram mr-2"></i><span>Instagram</span>
              </a>
              <a class="" href="https://www.facebook.com/shidki.shidki.92?mibextid=ZbWKwL">
                <i class="fa fa-facebook mr-2"></i><span>Facebook</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
          <h4>
            Email
          </h4>
          <form action="#">
            <input type="text" placeholder="Masukkan pesan" id="msg"/>
            <button type="submit" id="btn_email">
              Kirim Email
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- jQery -->

  <script type="text/javascript" src="{{ asset('assets/landing_page/js/jquery-3.4.1.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('assets/landing_page/js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/landing_page/js/custom.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <script>
    function toggleDeskripsi(button) {
      var deskripsi = button.parentNode.querySelector('.deskripsi_layanannnn');
      var icon = button.querySelector('#icon_deskripsi');
      if (deskripsi.style.display === "none") {
        deskripsi.style.display = "block";
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
      } else {
        deskripsi.style.display = "none";
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
      }
    }
  </script>
  <script>
            //  untuk deskrpsi layanan
            var deskripsi_layanan_container = document.getElementById('deskripsi_layanan_container');
            deskripsi_layanan_container.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var Namalayanan = deskripsi_layanan_container.querySelector('#nama_dinas_modal2');
            Namalayanan.textContent = parsedDataId.nama;
            console.log(parsedDataId.deskripsi);
            var deskripsilayananCont = deskripsi_layanan_container.querySelector('#deskripsi_layanan');
            if(parsedDataId.deskripsi !== null){
                deskripsilayananCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                deskripsilayananCont.textContent = parsedDataId.deskripsi
            
            }else{
                var h3 = document.createElement("h3"); // Perbaikan: Penggunaan createElement
                h3.textContent = "Belum Ada Deskripsi"
                h3.setAttribute('class','text-center text-danger');
                deskripsilayananCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                deskripsilayananCont.appendChild(h3);
            }
        });
  </script>
</body>

</html>