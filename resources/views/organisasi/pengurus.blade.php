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

<section id="partner">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Struktur Kepengurusan di Gabsi</h2>
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
    </div>
    <div class="partners"></div>

  </div>
  <!--/.container-->
</section>
<!--/#partner-->

<div class="feature">
  <div class="container">
    <div class="text-center row">
      <!-- <div class="col-md-5">
        <div href="" class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <a href="{{ url('/pusat') }}"> <img style="height: 100px;" src="{{ asset('images/logo/1.png') }}">
            <h2>Pengurus Gabsi Pusat</h2></a>
            <p>Struktur Kepengurusan Gabsi Pusat</p>
        </div>
      </div> -->
      <center>
      <div class="col-md-7">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <!--  <i class="fa fa-laptop"></i> -->
          <a href="{{ url('/jatim') }}"> <img style="height: 100px;" src="{{ asset('images/logo/3.png') }}">
            <h2>Pengurus Gabsi Jatim</h2>
            <p>Struktur Kepengurusan Gabsi Jatim</p>
        </div>
      </div>
      </center>
    <!--  <div class="col-md-4">
        <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
          <a href="{{ url('/kabkot') }}"> <img style="height: 100px;" src="{{ asset('images/logo/3.png') }}">
            <h2>Pengurus Kota/Kabupaten</h2>
            <p>Struktur Kepengurusan di Kota/Kabupaten (Jatim)</p>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection
