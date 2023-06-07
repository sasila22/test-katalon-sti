@extends('layouts.app-master')

@section('content')

<div class="KotakAtas">
    <a href="#"></a>
</div>

<div class="lates">
  <div class="text-center">
  </div>
</div>

  <section id="portfolio">
    <div class="container">
    <div class="lates">
      <div class="text-center">
        <h2>Galeri Event Gabsi Jatim</h2>
      </div>
    </div>

      <!--/#portfolio-filter-->
    </div>
    <div class="container">
      <div class="">
        <div class="portfolio-items">
        @foreach ($galeris as $key => $g)
            @if( $g->status == 0 )
                <div class="portfolio-item  bootstrap col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                    <img class="img-fluid" src="{{ url('foto/galeri/'.$g->file) }}" alt="">
                    <div class="overlay">
                        <div class="recent-work-inner">
                        <h4>{{ $g->judul }}</h4><br>
                        </div>
                    </div>
                    </div>
                </div>
            @elseif( $g->status == 1 )
                <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3">
                <div class="recent-work-wrap">
                    <video width="320" height="240" class="img-fluid" controls alt="">
                    <source src="{{ url('foto/galeri/'.$g->file) }}">
                    </video>
                    <div class="overlay">
                    <div class="recent-work-inner">
                        <h4>{{ $g->judul }}</h4>
                    </div>
                    </div>
                </div>
                </div>
            @endif
        @endforeach
          <!--/.portfolio-item-->

        </div>
      </div>
    </div>
  </section>
  <!--/#portfolio-item-->
@endsection
