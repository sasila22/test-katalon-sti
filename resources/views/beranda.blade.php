@extends('layouts.app-master')

@section('content')

<div class="KotakAtas">
    <a href="#"></a>
</div>

<div class="lates">
  <div class="text-center">
  </div>
</div>
<br>
{{-- <div class="container">
  <div id="beritas">
    <div class="text-center">
      <br>
      <h4>Berita Terbaru</h4>
    </div>
    <br>
    @foreach ($beritas as $key => $b)
    <div class="col-md-4 wow fadeInDown" id="beritaberanda" data-wow-duration="1000ms" data-wow-delay="300ms">
      <img src="{{ url('foto/berita/'.$b->foto) }}" class="img-responsive" style="max-height: 250px;" />
      <h3>{{ $b->judul }}</h3>
      <p>{{ $b->deskripsi }}</p><br>
      @if (Route::has('login'))
        @if (Auth::check())
          @if (Auth::user()->status == '1')
          <a class="btn btn-primary readmore" href="{!! action('AkunController@beritadetail', $b->id) !!}">Read More </a>
          @endif
        @else
        <a class="btn btn-primary readmore" href="{!! action('PagesController@beritadetail', $b->id) !!}">Read More </a>
        @endif
    @endif
    </div>
    @endforeach
    <br>
    <div class="text-center">
    <br>
    @if (Route::has('login'))
        @if (Auth::check())
          @if (Auth::user()->status == '1')
          <a class="btn btn-primary readmore" style="margin-top: 30px;" href="{{ url('/eberita') }}">Show All </a>
          @endif
        @else
        <a class="btn btn-primary readmore " style="margin-top: 30px;" href="{{ url('/unberita') }}">Show All </a>
        @endif
    @endif
    </div>
    <br>
  </div>
  <br>
  <div id="fotos">
    <div class="text-center">
      <br>
      <h4>Foto Kegiatan</h4>
    </div>
    <br>
      @foreach ($galeri as $key => $g)
        <div class="col-md-4" id="beritaberanda" data-wow-duration="1000ms" data-wow-delay="300ms">
          <img src="{{ url('foto/galeri/'.$g->file) }}" class="img-responsive" style="max-height: 250px;" />
          <br>
        </div>
      @endforeach
    <br>
      @if (Route::has('login'))
        @if (Auth::check())
          @if (Auth::user()->status == '1')
          <div class="text-center2">
            <a class="btn btn-primary readmore" href="{{ url('/egaleri') }}" >Show More </a>
          </div>
          @endif
        @else
        <div class="text-center2">
            <a class="btn btn-primary readmore" href="{{ url('/ungaleri') }}">Show More </a>
        </div>
        @endif
      @endif
    <br>
  </div> --}}
  <div class="pt-2 position-relative">
    <div class="text-center position-relative pt-3" style="z-index: 1000">
      <h1 class="bold">
        Kembangkan
        <span class="text-danger">Potensimu</span>
      </h1>
      <h2 class="bold" style="color:black!important;font-size:32px!important;margin-top: 0px!important;margin-bottom: 0px!important;text-transform:none!important;">Bersama Gabsi Jawa Timur</h2>
    </div>
    <div class="container-xxl container-xl container-fluid container_relative">
      <div class="row pt-3 gx-3 gy-5 r1">
        <div class="col-lg-4 col-12 c1">
          <h5 class="c1_deskripsi ms-xxl-5 ps-xxl-5 float-md-end text-sm-left" style="">Merupakan komitmen kami untuk mengembangkan atlet bridge Jawa Timur</h5>
          <div class="c1_divimg">
            <img src="{{asset('./imagesatas/kiri.png')}}" class=" rounded-3 c1_divimg_image ms-xxl-5 ps-xxl-5 float-md-end float-sm-none" style="padding-top: 10px;"/>
          </div><br>
          <form action="{{url('/tentanggabsi')}}">
            <button class="btn btn-green ms-xxl-3 ms-xl-2 float-md-end float-end c1_btn" style="position: relative; top: 10px; width: 250px; height:80px ; font-size: 26px; border-radius: 100px;">Tentang Kami</button>
          </form>

        </div>
        <div class="col-lg-8 c2">
          <div class="row c2_r1">
            <div class="col
             c2_r1_c1"><img src="{{asset('imagesatas/tengahkiriatas.png')}}" class="rounded-3 img-fluid" style="position:relative; padding-right:0px;"/></div>
            <div class="col c2_r1_c2">
                <div class="row c2_r1_c2_r1" style="padding:0px;">
                  <div class="col-xl-9 col-12 c2_r1_c2_r1_c1"><h5 style="">Berbagai upaya pembinaan dilakukan untuk menggapai prestasi</h5></div>
                  <div class="col-xl-3 col-0 c2_r1_c2_r1_c2"></div>
                </div>
                <br>
                <div class="row d-flex pt-xl-0 pt-0 row c2_r1_c2_r2" style="">
                  <div class="col c2_r1_c2_r2_c1" style="padding:0px;">
                    <img src="{{asset('imagesatas/tengahkananatas.png')}}" class="rounded img-fluid" />
                  </div>
                  <div class="col ps-1 c2_r1_c2_r2_c2" style="padding:0px;">
                    <img src="{{asset('imagesatas/kananatas.png')}}" class="rounded img-fluid" />
                  </div>

                </div>
            </div>
          </div>
          <div class="row pt-2 c2_r2" style="padding-left:0px;padding-right:0px;">
            <div class="col-4 ps-xxl-3 ps-xl-2 ps-sm-0 c2_r2_c1" style="padding-left:0px;padding-right:0px;"><img src="{{asset('imagesatas/tengahkiribawah.png')}}" class="rounded-3 img-fluid" style=""/></div>
            <div class="col-5 ps-xxl-3 ps-xl-2 c2_r2_c2" style="padding-left:0px;padding-right:0px;"><img src="{{asset('imagesatas/tengahkananbawah.png')}}"class="rounded-3 img-fluid" style=""/></div>
            <div class="col-3 ps-xxl-3 ps-xl-2 ps-sm-0 c2_r2_c3" style="padding-left:0px;padding-right:0px;"><img src="{{asset('./imagesatas/kananbawah.png')}}" class="rounded-3 img-fluid" style=""/></div>
          </div>
          <!-- <div class="">
            <img src="imagesatas/tengahkiriatas.png" class="rounded-3" style="position:relative; padding-right:0px;"/>
            <img src="imagesatas/tengahkiribawah.png" class="rounded-3" style="padding:5px; top: 14vh;"/>
          </div> -->
        </div>

        <!-- 2gambar kanan atas di dempetkan -->
        <!-- <div class="col-lg-4 col-12">
          <h5 style="position:relative; margin-right: 100px; padding-left: 100px;">Berbagai upaya pembinaan dilakukan untuk menggapai prestasi</h5>
          <div class="" >
            <img src="imagesatas/tengahkananatas.png" class="rounded float-start" style="position: relative; padding-left: 70px; top: 5vh;"/>
            <img src="imagesatas/kananatas.png" class="rounded float-end" style="position: relative; top: -26vh; right: -20px;" />
            <img src="imagesatas/kananbawah.png"class="rounded-3" style="position:relative; left: 260px; top: 8vh;"/>
            <img src="imagesatas/tengahkananbawah.png"class="rounded-3" style="position: relative; ; margin-left: -140px;"/>
          </div>
        </div> -->

    </div>
    </div>
  </div>

      <!-- News -->
      <div class="pt-4 container position-relative" style="z-index: 1000">
        <div class="text-center">
          <h1 class="bold">Berita Terbaru</h1>
        </div>
        <div class="row pt-3 gx-3 gy-5">
            @foreach ($beritas as $key => $b)
            <div class="col-lg-4 col-12">
                <div class="">
                  <img
                    src="{{ url('foto/berita/'.$b->foto) }}"
                    class="rounded-3"
                    style="object-fit: cover; width: 100%; height: 250px"
                  />
                </div>
                <h5 class="pt-2">{{ $b->judul }}</h5>
                <p style="text-align: justify">
                    {{ $b->deskripsi }}
                </p>
                <div class="d-flex flex-row flex-nowrap justify-content-between">
                  <a href="{{ url('/unberita/'.$b->id) }}">
                  <button class="btn btn-second"><small>Read More</small></button>
                    <i class="fa-solid fa-arrow-right" style="color: #53b596"></i>
                  </a>
                </div>
              </div>
            @endforeach

          {{-- <div class="col-lg-4 col-12">
            <div class="">
              <img
                src="imagesatas/swiss.png"
                class="rounded-3"
                style="object-fit: cover; width: 100%; height: 250px"
              />
            </div>
            <h5 class="pt-2">Turnamen Bridge Online Swiss Paris KU 21</h5>
            <p style="text-align: justify">
              Turnamen Bridge Online Swiss Pairs KU 21
              yang diselenggarakan pada bulan Maret...
            </p>
            <div class="d-flex flex-row flex-nowrap justify-content-between">
              <a href="detailberita.html">
              <button class="btn btn-second"><small>Read More</small></button>
                <i class="fa-solid fa-arrow-right" style="color: #53b596"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-12">
            <div class="">
              <img
                src="imagesatas/pedulikorban.png"
                class="rounded-3"
                style="object-fit: cover; width: 100%; height: 250px"
              />
            </div>
            <h5 class="pt-2">Gabsi Jatim Aksi Peduli Korban Bencana</h5>
            <p style="text-align: justify">
              Gabsi Jatim menggelar Turnamen Bridge
              Online sebagai bentuk aksi penggalangan...
            </p>
            <div class="d-flex flex-row flex-nowrap justify-content-between">
              <a href="detailberita.html">
              <button class="btn btn-second" data-toggle="modal" data-target="#myModal"><small>Read More</small></button>
                <i class="fa-solid fa-arrow-right" style="color: #53b596"></i>
              </a>
            </div>
          </div> --}}
        </div>
        <div class="text-center mt-3">
            @if (Route::has('login'))
            @if (Auth::check())
            @if (Auth::user()->status == '1')
            <form action="{{url('/eberita')}}">
                <button class="btn btn-green px-4">Berita Lainnya</button>
            </form>
            @endif
            @else
            <form action="{{url('/unberita')}}">
                <button class="btn btn-green px-4">Berita Lainnya</button>
            </form>
            @endif
            @endif
        </div>
      </div>

      <!-- Galeri -->
      <div class="position-relative" style="margin-top: 5rem">
        <img
          class="position-absolute top-0 img-fluid"
          src="images/Rectangle1.png"
        />
        <div class="position-relative" style="z-index: 1000">
          <div class="container-fluid">
            <div
              class="d-flex flex-row flex-nowrap align-items-center gap-5 pt-5 ps-3"
            >
              <div>
                <h1 class="bold m-0">Galeri</h1>
                <p class="bolder m-0">Jangan Lewatkan Momen Berhargamu</p>
              </div>
              <div>
              @if (Route::has('login'))
                  @if (Auth::check())
                    @if (Auth::user()->status == '1')
                    <a href="{{ url('/egaleri/') }}">
                    <button class="btn btn-green">Lihat Lainnya</button>
                </a>
                    @endif
                  @else
                  <div class="text-center2">
                      <a href="{{ url('/ungaleri/') }}">
                      <button class="btn btn-green">Lihat Lainnya</button>
                </a>
                  </div>
                  @endif
                @endif

              </div>
            </div>
          </div>

          <div class="swiper mt-4 ms-3">
            <div style="padding-bottom:100px;" class="swiper-wrapper">
            @foreach ($galeri as $key =>$g)
              <div class="swiper-slide" >
              <img
                  src="{{ url('foto/galeri/'.$g->file) }}"
                  style="width: 600px; height: 400px; object-fit: cover"
                />
                <H2 style="color:black;">{{$g->judul}}</H2>
                @if (Route::has('login'))
                  @if (Auth::check())
                    @if (Auth::user()->status == '1')
                    <div class="text-center2 slide-link">
                        <a href="{{ url('/egaleri/'.$g->id) }}" class="btn btn-green">
                            {{-- <button class="btn btn-green">Show Album</button> --}}
                            Show Album
                        </a>
                    </div>
                    @endif
                  @else
                  <div class="text-center2 slide-link">
                    <a href="{{ url('/ungaleri/'.$g->id) }}" class="btn btn-green">
                        Show Album
                        {{-- <input type="button" class="btn btn-green" onClick="this.disabled=true;"> --}}
                    </a>
                  </div>
                  @endif
                @endif

              </div>
            @endforeach

            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>

  {{-- <br>
  <div id="kontak">
    <div class="text-center">
      <br>
      <h4>Kontak Kami</h4>
      <br>
      @foreach ($tentang as $key => $tentang)
      <p><b>Email</b> : {{ $tentang->email }}</p>
      <p><b>No. Telepon</b>: {{ $tentang->notlp }}</p>
      <p><b>Alamat Sekretariat</b> : {{ $tentang->alamat }}</p>
      @endforeach
      <br>
    </div>
  </div>
</div> --}}




<!--       <section id="main-slider" class="no-margin">
  <div class="carousel slide">
    <div class="carousel-inner">
      <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
        <div class="container">
          <div class="row slide-margin">
            <div class="col-sm-6">
              <div class="carousel-content">
                <h2 class="animation animated-item-1">Selamat Datang di Website<br><span>Gabsi Jatim</span></h2>
                <p class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</p>
                <a class="btn-slide animation animated-item-3" href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!--       <div class="feature">
  <div class="container">
    <div class="text-center">
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-book"></i>
          <h2>Full Responsive</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <i class="fa fa-laptop"></i>
          <h2>Retina Ready</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-heart-o"></i>
          <h2>Full Responsive</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
          <i class="fa fa-cloud"></i>
          <h2>Friendly Code</h2>
          <p>Quisque eu ante at tortor imperdiet gravida nec sed turpis phasellus.</p>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!--<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="#"></a></li>
    </div>
  </div>
</div>-->

<!--<div class="about">
  <div class="container">
    <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
       <h2>Tentang Gabsi Jatim</h2>
      <a href="{{ url('tentanggabsi') }}"><img src="{{ asset('images/8.jpg') }}" class="img-responsive" /></a>
    </div>

    <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
      <h2>Template built with Twitter Bootstrap</h2>
      <p></p>
    </div>
  </div>
</div>-->

<!--<div class="lates">
  <div class="container">
    <div class="text-center">
      <h2>Berita Terbaru</h2>
    </div>
    @foreach ($beritas as $key => $b)
    <div class="col-md-4 wow fadeInDown" id="beritaberanda" data-wow-duration="1000ms" data-wow-delay="300ms">
      <img src="{{ url('foto/berita/'.$b->foto) }}" class="img-responsive" style="max-height: 250px;" />
      <h3>{{ $b->judul }}</h3>
      <p>{{ $b->deskripsi }}</p>

      @if (Route::has('login'))
        @if (Auth::check())
        @if (Auth::user()->status == '1')
        <a class="btn btn-primary readmore" href="{!! action('AkunController@beritadetail', $b->id) !!}">Read More</a>
        @endif
        @else
        <a class="btn btn-primary readmore" href="{!! action('PagesController@beritadetail', $b->id) !!}">Read More</a>
        @endif
      @endif
    </div>
    @endforeach
  </div>
</div>-->

<!--<section id="partner">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Our Partners</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
    </div> -->

<!--<div class="partners">
      <ul>
        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li>
        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partner5.png"></a></li>
      </ul>
    </div>
  </div>
</section> -->
<!--/#partner-->

<!--<section id="conatcat-info">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="pull-left">
            <i class="fa fa-phone"></i>
          </div>
          <div class="media-body">
            <h2>Have a question or need a custom quote?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
@endsection
