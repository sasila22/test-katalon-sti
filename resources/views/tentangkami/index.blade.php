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
<div class="container">
    <div class="lates">

        <div class="text-center">
          <h2>TENTANG KAMI</h2>
        </div>

      <hr>
      <div class="row">
        <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Mengenal Olahraga Bridge</h2>
            <br>
            <p style="text-align: justify; white-space: pre-line;">Bridge ialah suatu olahraga yang memakai media kartu.
                  Dalam permainan ini, memakai satu set kartu yang dimainkan oleh 4 orang yang dimainkan dalam satu meja.
                  Bridge merupakan satu cabang olahraga yang diakui oleh dunia yang membutuhkan kejelian dalam melihat peluang
                  maupun penyusunan strategi, yang pastinya bakal mengasah otak para pemainnya. </p>
                  <p>Gambar: Olahraga bridge dan perjalanannya menjadi cabang olahraga. (Foto: Pixabay)</p>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <img src="images/bridgetentang.JPG" class="img-fluid">
            <br>
          </div>
      </div>


      @foreach ($tentang as $key => $tentang)
      <hr>
      <br>
      <div class="row">
        <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Sejarah Gabsi</h2>
            <br>
            <p style="text-align: justify; white-space: pre-line;">{{ $tentang->tentanggabsi }}</p>
            <img src="images/8.jpg" class="img-fluid">
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="skill">
              <h2>Kontak Kami</h2>
              <br>
              <p>Jika ingin menghubungi Kami, silahkan hubungi kontak dibawah ini.</p><p>Terima Kasih.</p>
            </div>
            <!-- <div class="col-md-5"> -->
            <div class="media">
                  <div class="media-body">
                    <h4>Email</h4>
                    <p>{{ $tentang->email }}</p>
                    <br>
                    <h4>No. Telepon</h4>
                    <p>{{ $tentang->notlp }}</p>
                    <br>
                    <h4>Alamat Sekretariat</h4>
                    <p>{{ $tentang->alamat }}</p>
                  </div>

            </div>
            <div class="tm-container-inner-2 tm-map-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="tm-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494.65
                                99782976454!2d112.76777568193216!3d-7.322432711613616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae3c2ffc04f%3A0x1d1cbfe2c9c2a17!2sUniversitas%20Surabaya-Fakultas%20Teknik!5e0!3m2!1sen!2sid!4v1616325862004!5m2!1sen!2
                                sid" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
          </div>
      </div>

      @endforeach
  </div>
</div>

@endsection
