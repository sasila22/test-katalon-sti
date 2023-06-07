<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>{{ config('app.name', 'Gabsi Jatim') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Bootstrap -->
  {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
  <link
      href="{{ asset('bootstrap.min.css') }}"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="{{asset('font-awesome/6.1.0/css/all.min.css')}}"
      integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
  <link
      rel="stylesheet"
      href="{{asset('swiper-bundle.min.css')}}"
    />



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap1.min.css') }}"> --}}

    <!-- Style CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
  @yield('scriptatas')

</head>
<body>

  <header>
    {{-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
           <img class="logogabsi" src="{{ asset('images/logo/2.png') }}">
              <a href="{{ url('home') }}"><h1><span>Gabsi Jatim</span></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                @if (Route::has('login'))
                @if (Auth::check())
                @if(Auth::user()->status == '0')
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out | {{ Auth::user()->name }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
                @elseif (Auth::user()->status == '1')
                <li role="presentation"><a href="{{ url('home') }}">Beranda</a></li>
                <li role="presentation"><a href="{{ url('pengurus') }}">Pengurus</a></li>
                <li role="presentation"><a href="{{ url('eberita') }}">Berita</a></li>
                <li role="presentation"><a href="{{ url('egaleri') }}">Galeri</a></li>
                <li role="presentation"><a href="{{ url('ekejuaraan') }}">Kejuaraan</a></li>
                <li role="presentation"><a href="{{ url('einformasi') }}">Informasi</a></li>
                <li role="presentation"><a href="{{ url('tentanggabsi') }}">Tentang</a></li>
                <li role="presentation">
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  </form>
                </li>
              @endif
              @else
              <li role="presentation"><a href="{{ url('home') }}">Beranda</a></li>
              <li role="presentation"><a href="{{ url('pengurus') }}">Pengurus</a></li>
              <li role="presentation"><a href="{{ url('unberita') }}">Berita</a></li>
              <li role="presentation"><a href="{{ url('ungaleri') }}">Galeri</a></li>
              <li role="presentation"><a href="{{ url('unkejuaraan') }}">Kejuaraan</a></li>
              <li role="presentation"><a href="{{ url('tentanggabsi') }}">Tentang</a></li>
              <li role="presentation">
                <a href="mailto:gabsijawatimur@gmail.com?Subject=Menanyakan Sesuatu%20again" target="_top" class="gplus tool-tip" title="Google Plus">FAQ</a>
              </li>
              <li role="presentation"><a href="{{ url('login') }}">Login</a></li>
              @endif
              @endif

            </ul>
          </div>
        </div>
      </div>
    </div>

  </nav> --}}
  <nav class="navbar navbar-expand-lg navbar-light" style="">
    <div class="container-fluid">
        <a class="navbar-brand" id="logo" href="#">
          <div class="d-flex fw-bolder gap-3">
            <img src="{{asset('images/logo.png')}}" alt="" width="15" />
            <h2 class="bold" href="#">
              GABSI
              <span class="text-green">JATIM</span>
            </h2>
          </div>
        </a>
        <div style="color:black;" id="time"></div>
        <!-- <button class="navbar-toggler" type="button"
        data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ms-auto align-items-start" style="float:left;">
                <form action="{{url('/')}}" method="get">
                    <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                      <div class="d-flex">
                        <input class="btn btn-nav nav_home active" type="submit" value="Beranda">
                        <div class="text-yellow pt-2">•</div>
                      </div>
                    </a>
                </form>
                <form action="{{ url('/pengurus')}}" method="get">
                  <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                      <div class="d-flex">
                        <input class="btn btn-nav nav_home" type="submit" value="Pengurus">
                        <div class="text-yellow pt-2">•</div>
                      </div>
                    </a>
                </form>
                @if (Route::has('login'))
                    @if (Auth::check())
                        @if (Auth::user()->status == '1')
                            <form action="{{ url('/eberita')}}" method="get">
                                <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                                <div class="d-flex">
                                    <input class="btn btn-nav nav_home" type="submit" value="Berita">
                                    <div class="text-yellow pt-2">•</div>
                                </div>
                                </a>
                            </form>
                            <form action="{{ url('/egaleri')}}" method="get">
                                <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                                <div class="d-flex">
                                    <input class="btn btn-nav nav_home" type="submit" value="Galeri">
                                    <div class="text-yellow pt-2">•</div>
                                </div>
                                </a>
                            </form>
                            <form action="{{ url('/ekejuaraan')}}" method="get">
                                <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                                <div class="d-flex">
                                    <input class="btn btn-nav nav_home" type="submit" value="Kejuaraan">
                                    <div class="text-yellow pt-2">•</div>
                                </div>
                                </a>
                            </form>
                            <form action="{{ url('/einformasi')}}" method="get">
                                <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                                <div class="d-flex">
                                    <input class="btn btn-nav nav_home" type="submit" value="Informasi">
                                    <div class="text-yellow pt-2">•</div>
                                </div>
                                </a>
                            </form>
                            {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                             {{ csrf_field() }}
                           </form> --}}
                           <form action="{{ url('/tentanggabsi')}}" method="get">
                                <a class="nav-item nav-link " style="padding-left:0px;padding-right:0px;">
                                <div class="d-flex">
                                    <input class="btn btn-nav nav_home" type="submit" value="Tentang">
                                    <div class="text-yellow pt-2">•</div>
                                </div>
                                </a>
                            </form>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-login ms-3">Logout</button>
                            </form>
                        @endif
                    @else
                        <form action="{{ url('/unberita')}}" method="get">
                            <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <div class="d-flex">
                                <input class="btn btn-nav nav_home" type="submit" value="Berita">
                                <div class="text-yellow pt-2">•</div>
                            </div>
                            </a>
                        </form>
                        <form action="{{ url('/ungaleri')}}" method="get">
                            <a class="nav-item nav-link" style="padding-left:0px;padding-right:0px;">
                            <div class="d-flex">
                                <input class="btn btn-nav nav_home" type="submit" value="Galeri">
                                <div class="text-yellow pt-2">•</div>
                            </div>
                            </a>
                        </form>
                        <form action="{{ url('/unkejuaraan')}}" method="get">
                            <a class="nav-item nav-link " style="padding-left:0px;padding-right:0px;">
                            <div class="d-flex">
                                <input class="btn btn-nav nav_home" type="submit" value="Kejuaraan">
                                <div class="text-yellow pt-2">•</div>
                            </div>
                            </a>
                        </form>
                        <form action="{{ url('/tentanggabsi')}}" method="get">
                            <a class="nav-item nav-link " style="padding-left:0px;padding-right:0px;">
                            <div class="d-flex">
                                <input class="btn btn-nav nav_home" type="submit" value="Tentang">
                                <div class="text-yellow pt-2">•</div>
                            </div>
                            </a>
                        </form>
                        <form action="{{url('login')}}">
                            <button class="btn btn-login ms-3">Login</button>
                        </form>
                    @endif
                @endif
                {{-- <form action="{{ url('/tentanggabsi')}}" method="get">
                    <a class="nav-item nav-link " style="padding-left:0px;padding-right:0px;">
                    <div class="d-flex">
                        <input class="btn btn-nav nav_home" type="submit" value="Tentang">
                        <div class="text-yellow pt-2">•</div>
                    </div>
                    </a>
                </form> --}}


                {{-- <li role="presentation" style="background-color:#13d6a6; border-radius:25px;"><a href="{{ url('login') }}" >Login</a></li> --}}

                <!-- <div class="nav_link d-flex align-items-center justify-content-center">
                  <ul class="d-flex flex-row gap-3">
                    <li><a href="#" class="active">Beranda</a></li>
                    <li class="text-yellow">•</li>
                    <li><a href="#">Pengurus</a></li>
                    <li class="text-yellow">•</li>
                    <li><a href="#">Berita</a></li>
                    <li class="text-yellow">•</li>
                    <li><a href="#">Galeri</a></li>
                    <li class="text-yellow">•</li>
                    <li><a href="#">Kejuaraan</a></li>
                  </ul>
                  <button class="btn btn-login ms-3">Login</button>
                </div> -->
            </div>
        </div>
    </div>
</nav>
</header>

{{-- <div style="min-height:85vh;"> --}}
<div>
    <img class="position-absolute top-1 end-0" style="opacity: 0.4;z-index: -1;" src="{{asset('images/Rectangle.png')}}"/>
    <img class="position-absolute top-1 end-0" style="opacity: 0.4;z-index: -1;" src="{{asset('images/dots.png')}}"/>
</div>
@yield('content')


{{-- </div> --}}

{{-- <hr> --}}
{{-- <footer class="footer-16371">

        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <div class="footer-site-logo mb-4">
              <a href="#">GABSI JATIM</a>
            </div>
            <br>
            <ul class="list-unstyled nav-links mb-5">
              <li><a href="{{ url('home') }}">Beranda</a></li>
              <li><a href="{{ url('pengurus') }}">Pengurus</a></li>

              @if (Route::has('login'))
                @if (Auth::check())
                  @if (Auth::user()->status == '1')
                  <li><a href="{{ url('/eberita') }}">Berita</a></li>
                  <li><a href="{{ url('/egaleri') }}">Galeri</a></li>
                  <li><a href="{{ url('/ekejuaraan') }}">Kejuaraan</a></li>
                  <li><a href="{{ url('/einformasi') }}">Informasi</a></li>
                  @endif
                @else
                <li><a href="{{ url('/unberita') }}">Berita</a></li>
                <li><a href="{{ url('/ungaleri') }}">Galeri</a></li>
                <li><a href="{{ url('/unkejuaraan') }}">Kejuaraan</a></li>
                @endif
              @endif
              <li><a href="{{ url('tentanggabsi') }}">Tentang</a></li>
            </ul>
            <br>
            <div class="social mb-4">
              <h3>Media Sosial Kami</h3>
              <ul class="list-unstyled">
              <a href="https://www.facebook.com/groups/gabsijatim/" class="fa fa-facebook"></a>
              <a href="https://www.youtube.com/channel/UCLSDrcrc2IpmoW0uEHmEG-g" class="fa fa-youtube"></a>
              <a href="https://www.instagram.com/gabsijatim/" class="fa fa-instagram"></a>
              </ul>
            </div>
          </div>
        </div>

</footer> --}}
<br>
<footer class="">
    <div class="container">
      <div class="row" style="padding-top: 10rem">
        <div class="col-lg-6 col-12 mt-3">
          <div>
            <h6 style="letter-spacing: 0.2rem; color: #b5b5b5" class="bold">
              FOLLOW US
            </h6>
            <div class="d-flex flex-row flex-nowrap gap-5 mt-3">
              <a href="#"><i class="fa-brands fa-youtube fa-xl text-green"></i></a>
              <a href="#"><i class="fa-brands fa-instagram fa-xl text-green"></i></a>
              <a href="#"><i class="fa-brands fa-facebook-f fa-xl text-green"></i></a>
              <a href="#"><i class="fa-brands fa-twitter fa-xl text-green"></i></a>
            </div>
          </div>

          <div class="mt-5">
            <h6 style="letter-spacing: 0.2rem; color: #b5b5b5" class="bold">
              INFORMATION
            </h6>
            <div class="row gap-3 mt-3">
              <div class="col-4">
                <a class="text-green" href="{{ url('/') }}">Beranda</a>
              </div>
              <div class="col-4">
                <a class="text-green" href="{{ url('/pengurus') }}">Pengurus</a>
              </div>
              @if (Route::has('login'))
              @if (Auth::check())
              @if (Auth::user()->status == '1')
                <div class="col-4">
                    <a class="text-green" href="{{ url('/eberita')}}">Berita</a>
                </div>
                <div class="col-4">
                    <a class="text-green" href="{{ url('/egaleri')}}">Galeri</a>
                </div>
                <div class="col-4">
                    <a class="text-green" href="{{ url('/ekejuaraan')}}">Kejuaraan</a>
                </div>

              @endif
              @else
                <div class="col-4">
                  <a class="text-green" href="{{ url('/unberita')}}">Berita</a>
                </div>
                <div class="col-4">
                  <a class="text-green" href="{{ url('/ungaleri')}}">Galeri</a>
                </div>
                <div class="col-4">
                  <a class="text-green" href="{{ url('/unkejuaraan')}}">Kejuaraan</a>
                </div>

              @endif
              @endif
              <div class="col-4">
                  <a class="text-green" href="{{ url('/tentanggabsi')}}">Tentang</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 mt-3">
          <div class="">
            <h7 style="letter-spacing: 0.2rem; color: #b5b5b5" class="bold">
              EMAIL
            </h7>
            <div>
              <h5 class="bold" >
                <a class="text-green" href="mailto:gabsijawatimur@gmail.com">
                  gabsijawatimur@gmail.com
                </a>
              </h5>
            </div>
          </div>
          <div class="mt-4">
            <h7 style="letter-spacing: 0.2rem; color: #b5b5b5" class="bold">
              NO TELPON
            </h7>
            <div>
              <h5 class="bold text-green">(031) 2981395</h5>
            </div>
          </div>
          <div class="mt-4">
            <h7 style="letter-spacing: 0.2rem; color: #b5b5b5" class="bold">
              ALAMAT SEKERTARIAT
            </h7>
            <div>
              <h5 class="bold text-green" style="text-align: justify">
                Kampus Universitas Surabaya - Jurusan Teknik Informatika (TC
                2.1) Jalan Raya Kalirungkut, Surabaya
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img
      src="{{asset('images/Wave.png')}}"
      style="width: 100%; height: 100%; object-fit: contain"
    />
  </footer>

  <script>
    //   $(document).ready(function() {
    //         alert("a");
    //         setInterval(function () {
    //           $.ajax({
    //           url: "http://worldtimeapi.org/api/timezone/Asia/Jakarta",
    //           success: function(result) {
    //             months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    //             days  = new Array('Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    //             year = result.datetime.substring(0,4)
    //             month = result.datetime.substring(5,7)
    //             day = result.datetime.substring(8,10)
    //             time = result.datetime.substring(11,19)
    //             log = days[parseInt(result.day_of_week)]+", "+day+" "+months[parseInt(month-1)]+" "+year+" / "+time;
    //             $("#time").text(log);
    //           }
    //           });
    //         }, 1000);
    //       })
  </script>



      <!-- jQuery Bootstrap -->
      <script type="text/javascript" src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
      <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
      <script src="{{ asset('js/wow.min.js') }}"></script>
      <script src="{{ asset('js/functions.js') }}"></script>

      @yield('scripttabel')
      @yield('skripkakik')
      <script src="{{asset('swiper-bundle.min.js')}}"></script>
      <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: "auto",
            spaceBetween: 30,
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
        });
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
        setInterval(function () {
            $.ajax({
            url: "http://worldtimeapi.org/api/timezone/Asia/Jakarta",
            success: function(result) {
            months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            days  = new Array('Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
            year = result.datetime.substring(0,4)
            month = result.datetime.substring(5,7)
            day = result.datetime.substring(8,10)
            time = result.datetime.substring(11,19)
            log = days[parseInt(result.day_of_week)]+", "+day+" "+months[parseInt(month-1)]+" "+year+" / "+time;
            $("#time").text(log);
            }
            });
        }, 1000);
      </script>
      	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/parallax.min.js') }}"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    @yield('script')

    </html>
