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
          @foreach ($events as $key => $e)

<!--            @if( $e->status == 0 ) -->
            <div class="portfolio-item  bootstrap col-xs-12 col-sm-4 col-md-3">
              <div class="recent-work-wrap">
                <img class="img-fluid" src="{{ url('foto/galeri/'.$e->cover) }}" alt="">
                <div class="overlay">
                  <div class="recent-work-inner">
                    <h3><a href="#">{{ $e->nama }}</a></h3><br>
                    <p>Diupload pada : {{ $e->created_at }}</p>
                    <a class="btn btn-primary readmore" href="{!! action('AkunController@galeridetail', $e->idevent) !!}">Show Album</a><br>
                  </div>
                </div>
              </div>
            </div>
            <!--/.portfolio-item-->
<!--            @elseif( $g->status == 1 )
            <div class="portfolio-item wordpress html apps col-xs-12 col-sm-4 col-md-3">
              <div class="recent-work-wrap">
                <video width="320" height="240" class="img-responsive" controls alt="">
                  <source src="{{ url('foto/galeri/'.$g->file) }}">
                </video>
                <div class="overlay">
                  <div class="recent-work-inner">
                    <h3><a href="#">{{ $g->judul }}</a></h3>
                    <p>{{ $g->ket }}</p>
                    <br>
                    <p>Diupload pada : {{ $g->created_at }}</p>
                    <a class="preview" href="{{ url('foto/galeri/'.$g->file) }}" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                  </div>
                </div>
              </div>
            </div>
            @endif -->
        @endforeach
          <!--/.portfolio-item-->

        </div>
      </div>
    </div>
  </section>

  <!--/#portfolio-item-->

@endsection
