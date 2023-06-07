@extends('layouts.app-master')

@section('content')

<div class="KotakAtas">
    <a href="#"></a>
</div>

<div class="lates">
  <div class="text-center">
  </div>
</div>

  <section id="blog" class="container">
    <div class="blog">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-item">
            <div class="row">

              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                @foreach ($beritas as $key => $berita)
    		        <!-- ini untuk misah created_at antara date sama time nya. kalo manggil temp[0] itu date, temp[1] itu time -->
    		        <?php
    		          $temp = explode(' ',$berita->created_at);
                  $idberita = $berita->id;
    		        ?>
                </div>
              </div>
                <div class="col-xs-12 col-sm-10 blog-content">
                  <h3>{{ $berita->judul }}</h3>
                  <a href="#"><img class="img-fluid img-blog" src="../foto/berita/{{ $berita->foto }}" height="100px" alt="" align="center" /></a>
                  <p style="text-align: justify; white-space: pre-line;">{{ $berita->isi }}</p>
                  <br>
                  <p>Diupload pada : {{ $berita->created_at }}</p>
                </div>

                @endforeach
            </div>
          </div>
          <!--/.blog-item-->
		    </div>
        <!--/.col-md-8-->
        <aside class="col-md-4">
          <div class="widget categories">
            <h3>Komentar</h3>
              <div class="row">
                <div class="col-sm-12">
                  @foreach ($komentars as $key => $komen)
                    <div class="single_comments">
                      <img src="{{ asset('images/blog/avatar3.png') }}" style="width: 10%; height: 10%;" alt="" />
                      <p>{{ $komen->komentar }}</p>
                      <div class="entry-meta small muted">
                        <span>By <a href="#">{{ $komen->users->name }}</a></span>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
          </div>
        </aside>

      </div>
      <!--/.row-->
    </div>
  </section>
  <section id="contact-page">
    <div class="container">
        <div class="row contact-wrap">
          <div class="status alert alert-success" style="display: none">
          </div>
            <div class="col-md-6 addkomen">
              <div id="sendmessage">Komentar Anda telah terkirim. Terima Kasih!</div>
              <div id="errormessage"></div>
              <div class="center"><h4 align="center">Tambahkan Komentar</h4></div>
              @foreach ($errors->all() as $error)
                <h4 style="color: red" align="center">{{ $error }}</h4>
              @endforeach
              <form role="form" action="{{ url('ekomentar') }}" method="POST" class="contactForm" enctype="multipart/form-data">
              {!! csrf_field() !!}
                  <div class="form-group">
                    <textarea class="form-control" name="komentar" rows="5" data-rule="required" data-msg="Tolong berikan komentar Anda dulu sebelum dikirim." placeholder="Komentar Anda" required=""></textarea>
                    <p>*maksimal 150 karakter</p>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" hidden="">
                    <input type="text" name="id_user" value="{{ Auth::user()->id }}">
                  </div>
                  <div class="form-group" hidden="">
                    <input type="text" name="id_berita" value="<?php echo $idberita; ?>">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Kirim</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
  </section>
@endsection
