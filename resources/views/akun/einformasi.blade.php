@extends('layouts.app-master')

@section('content')


<div class="KotakAtas">
    <a href="#"></a>
</div>

<div class="lates">
  <div class="text-center">
  </div>
</div>
  <div class="aboutus">
    <div class="container">

      <h3 style="text-align:center;">Informasi Berita</h3>
      <hr>
      <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h4>Fitur ini bertujuan supaya Anda bisa memberitahukan informasi terkait olahraga bridge di Indonesia kepada pengurus website dan jika seusai maka dapat di upload di website ini. Jadi silahkan berikan informasi yang Anda miliki. Terima Kasih.</h4>     
      </div>
        <br>
          <div class="panel-body">
            @foreach ($errors ->all() as $error)
              <h4 style="color: red">{{ $error }}</h4>
            @endforeach
            @if (session('status')) 
              <h4 style="color: green;">{{ session('status') }}</h4>
            @endif
            @if (session('statussalah')) 
              <h4 style="color: red;">{{ session('statussalah') }}</h4>
            @endif
            <form role="form" action="{{ route('esimpaninfo.simpaninfo') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label style="color: black;">Judul Informasi :</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Judul Informasi Di Sini" required>
                  <p class="help-block">Contoh : Pemenang Lomba Bridge</p>
                </div>

                <div class="box-body pad">
                  <label style="color: black;">Deskripsi Singkat Informasi :</label>
                  <br>
                  <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80" class="form-control" style="color: black;" required></textarea>
                  </form>
                  <br>
                  <p class="help-block">Contoh : Pemenang lomba Bridge yang diselenggarakan pada Minggu, 18 Februari 2018 telah sampai ke tanah air.</p>
                </div>

                <div class="form-group">
                  <label style="color: black;">Detail Informasi :</label>
                  <input type="file" name="formulir" style="color: black;" required>
                  <p class="help-block">Upload detail informasi dalam format file Word (.doc).</p>
                </div>
                
                <div class="form-group">
                  <label style="color: black;">Foto Informasi :</label>
                  <input type="file" name="foto" style="color: black;" required>
                  <p class="help-block">Pilih Gambar Untuk Informasi</p>
                </div>
                <div class="form-group" hidden="">
                  <input type="text" name="penulis" value="{{ Auth::user()->id }}">
                </div>
              
              <!-- /.box-body -->

                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                </div>
              </div>
            </form>
          </div>       
      </div>
    </div>
  </div>
@endsection