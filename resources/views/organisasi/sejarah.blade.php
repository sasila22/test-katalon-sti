@extends('layouts.app')

@section('content')

<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Home</a></li>
      <li>Sejarah</li>
    </div>
  </div>
</div>

<div class="aboutus" style="padding-top: 1px;">
  <div class="container">
    <h3>SEJARAH GABSI</h3>
    <hr>
    <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
      <img src="images/7.jpg" class="img-responsive">
      <h4>B R I D G E &nbsp I N D O N E S I A</h4>
      <p style="text-align: justify;">&nbsp &nbsp Belum tersedia data kepustakaan yang akurat mengenai kapan permainan bridge masuk ke Indonesia. Namun diperkirakan tahun 1880 permainan bridge mulai masuk ke Indonesia dibawa oleh orang Eropa atau tentunya orang Belanda.</p>
      <p style="text-align: justify;">&nbsp &nbsp Atas prakarsa Willy Th. Roring seorang perwira TNI-AL bersama rekan-rekannya pada tanggal 12 Desember 1953 lahirlah Gabungan Bridge Seluruh Indonesia (GABSI) di kota Surabaya. Diawali hanya beranggotakan 8 (delapan) gabungan dan kini sudah tersebar di Seluruh Indonesia (sampai saat ini sudah ada Pengurus Daerah di 29 propinsi, kecuali Maluku Utara). Kejuaraan Nasional pertama kali diselenggarakan pada tahun 1957 di Yogyakarta. GABSI kemudian menjadi anggota KOGOR (Komando Gerakan Olahraga) pada tahun 1960 dan selanjutnya pada tahun 1966 KOGOR dibubarkan dan diganti dengan KONI (Komite Olahraga Nasional). Seluruh Induk organisasi mantan anggota KOGOR secara otomatis mejadi anggota KONI.</p>
      <p style="text-align: justify;">&nbsp &nbsp Pada tahun 1960 Indonesia diterima menjadi anggota World Bridge Federation (WBF) dan Far East Bridge Federation (FEBF) yang kini sudah berganti nama menjadi Pacifik Asia Bridge Federation (PABF).Dibandingkan dengan dua organisasi tingkat Asia Pacific yaitu Pacific Asia Bridge Federation (PABF) dan World Bridge Federation (WBF) dari segi usia GABSI masih lebih tua. WBF baru lahir pada tahun 1958 malah PABF atau dulu lebih dikenal dengan Far East Bridge Federation (FEBF) malah lebih dulu dua tahun, yaitu tahun 1956.</P>
      </div>
      <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="skill">
          <h2>Seperti Apa Bridge itu?</h2>
          <p>Berikut video tentang Olahraga Bridge :</p>
          <p><i>Sumber : Youtube (Emelia Melvina)</i></p>

          <div class="progress-wrap">
            <iframe width="450" height="315" src="https://www.youtube.com/embed/Z-Ea8jBnv28" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <br>
          <div class="progress-wrap" style="border: 3px solid black; border-radius: 10px; border-color: #1BBD36; width: 101%; height: 310px; padding-left: 10px;padding-right: 10px">
           <div class="widget archieve">
            <h3>BERITA TERBARU</h3>
            <div class="row">
              <div class="col-sm-12">
                <ul class="blog_archieve">
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2015 <span class="pull-right">(97)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2015 <span class="pull-right">(32)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2015 <span class="pull-right">(19)</span></a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2015 <span class="pull-right">(08)</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
