@extends('layouts.app-master')

@section('content')
<div class="KotakAtas">
    <a href="#"></a>
</div>

<div class="lates">
  <div class="text-center">
  </div>
</div>


<div class="lates">
    <div class="container-xxl">
      <div class="text-center">
        <h2>Berita Terbaru</h2>
      </div>
        <div class="row">
        @foreach ($beritas as $key => $b)
      <div class="col-md-4 wow fadeInDown" id="beritaberanda" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="{{ url('foto/berita/'.$b->foto) }}" class="img-fluid" style="max-height: 250px; " />
        <h3>{{ $b->judul }}</h3>
        <p>{{ $b->deskripsi }}</p>

        @if (Route::has('login'))
          @if (Auth::check())
          @if (Auth::user()->status == '1')
          <a class="btn btn-primary readmore" href="{!! action('AkunController@beritadetail', $b->id) !!}">Read More</a>
          @endif
          @else
          <a class="btn btn-primary readmore" href="{!! action('PagesController@beritadetail', $b->id) !!}">Read More </a>
          @endif
        @endif
      </div>
      @endforeach
        </div>

    </div>
  </div>
@endsection
