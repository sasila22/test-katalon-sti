@extends('layouts.app-master')

@section('content')

<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Beranda</a></li>
      <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
      <li>Pengurus Pusat</li>
    </div>
  </div>
</div>

<center>
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 6%; margin-top: 6%">
    <div class="widget archieve">
      <h3 class="pengurus-title">PENGURUS GABSI PUSAT</h3>
        <div class="pengurus-tengah">
          <p class="pengurus-jabatan-tengah">Pelindung</p>
            <p class="pengurus-anggota-tengah">1. Jenderal TNI (Purn) Wiranto<br>
              2. Menteri Pemuda dan Olahraga<br>3. Menteri Pendidikan Nasional<br>
              4. Ketua Umum KONI<br>5. Ketua Umum KOI</p><br>
          <p class="pengurus-badan-tengah">BADAN PEMBINA</p>
            <p class="pengurus-jabatan-tengah">Ketua</p>
              <p class="pengurus-anggota-tengah">Michael Bambang Hartono</p>
            <p class="pengurus-jabatan-tengah">Sekretaris</p>
              <p class="pengurus-anggota-tengah">Theodore Permadi Rachmat</p>
            <p class="pengurus-jabatan-tengah">Anggota</p>
            <p class="pengurus-anggota-tengah">1. Wimpy S Tjetjep<br>
              2. Bennt J Ibradi<br>3. Andreas Wihardja</p><br>
          <p class="pengurus-badan-tengah">BADAN PENGAWAS</p>
            <p class="pengurus-jabatan-tengah">Ketua</p>
              <p class="pengurus-anggota-tengah">Handojo Susanto</p>
            <p class="pengurus-jabatan-tengah">Anggota</p>
              <p class="pengurus-anggota-tengah">1. Indra Kusuma<br>
                2. Constan M Ponggawa, SH, LLM<br>3. Drs. Amir Abadi Yusuf, Ak.<br>
                4. Anton Sulaiman</p>
            <p class="pengurus-jabatan-tengah">Ketua Umum</p>
              <p class="pengurus-anggota-tengah">Prof. Miranda S. Goeltom., S.E., M.A., Ph.D</p>
            <p class="pengurus-jabatan-tengah">Wakil Ketua Umum</p>
              <p class="pengurus-anggota-tengah">Mayor Jenderal TNI Ivan Ronald Pelealu</p>
            <p class="pengurus-jabatan-tengah">Ketua Harian</p>
              <p class="pengurus-anggota-tengah">Didi Andries</p>
            <p class="pengurus-jabatan-tengah">Sekretaris Jenderal</p>
              <p class="pengurus-anggota-tengah">Purba Robert Mangapul Sianipar</p>
            <p class="pengurus-jabatan-tengah">Bendahara Umum</p>
              <p class="pengurus-anggota-tengah">Tanudjan Sugiarto</p>
            <p class="pengurus-jabatan-tengah">Wakil Bendahara</p>
              <p class="pengurus-anggota-tengah">Sunyoto Prasetyo</p>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
          <p class="pengurus-bidang-kiri">Bidang Organisasi & Hukum</p><br>
                <p class="pengurus-anggota-kiri"><b>Ketua :</b> Muhaimin Abdullah</p>
                <p class="pengurus-jabatan-kiri">Anggota : </p>
                  <p class="pengurus-anggota-kiri">1. Alfi Darwin<br>
                    2. Ronny Aek Lontoh<br>3. Dewi Setyowati</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
          <p class="pengurus-bidang-kanan">Komite Pembentukan & Pembinaan Tim Nasional</p><br>
                  <p class="pengurus-anggota-kanan"><b>Ketua :</b> Laksamana Pertama TNI Teguh Widodo</p>
                  <p class="pengurus-anggota-kanan"><b>Wakil Ketua :</b> Kelik Irwanto</p>
                  <p class="pengurus-anggota-kanan"><b>Sekretaris :</b> Pramudita Munandar</p>
                  <p class="pengurus-jabatan-kanan">Anggota : </p>
                    <p class="pengurus-anggota-kanan">1. Rustam Effendy<br>2. Joto then<br>3. Arnold Johan Laseduw</p><br>
          </div>
        </div>    
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Bidang Liga Bridge nasional</p><br>
                <p class="pengurus-anggota-kiri"><b>Ketua :</b> Henky Lasut</p>
                <p class="pengurus-anggota-kiri"><b>Wakil Ketua : </b>Hendra Railis</p>
                <p class="pengurus-jabatan-kiri">Anggota</p>
                  <p class="pengurus-anggota-kiri">1. Ch. Nurhamiddin<br>2. Iswan Nurdin</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="pengurus-bidang-kanan">Bidang Program Bridge Masuk Sekolah</p><br>
              <p class="pengurus-anggota-kanan"><b>Ketua : </b>Sentot Brahmantyo</p>
              <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Kol. Laut (Purn) DR. Freddy Johanis Rumambi,MM</p>
              <p class="pengurus-jabatan-kanan">Anggota</p>
              <p class="pengurus-anggota-kanan">1. Perwira Sakti Lubis<br>2. Chris Hombokau<br>
                3. Kusumo Hararyo<br>4. Iwan Riyadi<br> 5. Abdul Hadi<br>6. Iswan Nurdi<br>
                7. Jonni Tua Sibuea<br>8. Sulu Wurangin Karamoy<br>9. Sem Wilson Adu<br>
                10. Fajri Yetty<br>11. Tjandrawati Sugita<br>12. BM Satria Dwi Putra<br>
                13. Meldry Zaghlul</p><br>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p class="pengurus-bidang-kiri">Bidang Pembinaan Prestasi</p><br>
                  <p class="pengurus-anggota-kiri"><b>Ketua : </b>Rustam Effendy</p>
                  <p class="pengurus-anggota-kiri"><b>Wakil Ketua : </b>Pramudita Munandar</p>
                <p class="pengurus-jabatan-kiri">Anggota : </p>
                <p class="pengurus-anggota-kiri">1. Tetty Petricola<br>2. Hendra Railis<br>
                  3. Syahrial Ali</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <p class="pengurus-bidang-kanan">Bidang Teknik dan Perwasitan</p><br>
                <p class="pengurus-anggota-kanan"><b>Ketua : </b>Joto Then</p>
                  <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>John Anthony William Tumewu</p>
                <p class="pengurus-jabatan-kanan">Anggota : </p>
                <p class="pengurus-anggota-kanan">1. Robert Soesono <br>
                  2. Supriyanto<br> 3. Andy Pramana</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Bidang Humas dan Publikasi</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Bert Toar Polii</p>
              <p class="pengurus-anggota-kiri"><b>Wakil Ketua : </b>Parpar Priatna</p>
              <p class="pengurus-jabatan-kiri">Anggota : </p>
              <p class="pengurus-anggota-kiri">1. Deddy Wirata<br>2. Ari Wangsa<br>
                3. Nursamsi<br></p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <p class="pengurus-bidang-kanan">Bidang Hubungan Luar Negri</p><br>
                <p class="pengurus-anggota-kanan"><b>Ketua : </b>Michael Bambang Hartono</p>
                <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Rusliden Hutagaol</p>
                <p class="pengurus-anggota-kanan"><b>Anggota : </b>Bert Toar Polii</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Bidang Daerah</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Sukmawati Anis</p>
              <p class="pengurus-anggota-kiri"><b>Wakil Ketua : </b>Faizal</p>
              <p class="pengurus-anggota-kiri"><b>Korwil Jawa & Banten : </b>Soemarmo WiroSasmito</p>
              <p class="pengurus-jabatan-kiri">Korwil Sumatera : </p>
                <p class="pengurus-anggota-kiri">1. Mier Valdes<br>
                  2. Edison Dt Gadang<br>3. dr. H Marlis, SP.OG</p>
              <p class="pengurus-jabatan-kiri">Korwil Sulawesi : </p>
                <p class="pengurus-anggota-kiri">1. Sukardi M Noor<br>2. Uyun Musa<br>
                  3. Hasan</p>
              <p class="pengurus-jabatan-kiri">Korwil Kalimantan : </p>
                <p class="pengurus-anggota-kiri">1. Cokorda Tri Udayana<br>
                2. Abdul Hadi</p>
              <p class="pengurus-anggota-kiri"><b>Korwil Bali, NTB, NTT : </b>John Da Costa</p>
              <p class="pengurus-anggota-kiri"><b>Korwil Maluku & Papua : </b>Johan Humbas</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="pengurus-bidang-kanan">Bidang Dana</p><br>
              <p class="pengurus-anggota-kanan"><b>Ketua : </b>Kelik Irwantono</p>
              <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Rahmad Tunggal Affifudin</p>
              <p class="pengurus-jabatan-kanan">Anggota : </p>
                <p class="pengurus-anggota-kanan">1.Mohammad Ilham Abdullah<br>2. Harke Tulenan<br>
                  3. Herry Zaman</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Komite Kredensial dan Arbitrase</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Laksamana Pertama TNI Teguh Widodo</p>
              <p class="pengurus-jabatan-kiri">Anggota : </p>
                <p class="pengurus-anggota-kiri">1. Deny Jacob Sacul<br>
                  2. Santje Panelewen<br>3. W.D. Karamoy<br>
                  4. Taufik Gautama Asbi</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="pengurus-bidang-kanan">Dewan Pelatih</p><br>
              <p class="pengurus-anggota-kanan"><b>Ketua : </b>Deny Jacob Sacul</p>
              <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Santje Panelewen</p>
              <p class="pengurus-jabatan-kanan">Anggota : </p>
                <p class="pengurus-anggota-kanan">1. FR Waluyan<br>2. Wolter Dirk Karamoy<br>
                  3. Taufik Gautama Asbi<br>4. Iskandar<br>5. Kamto<br>6. Jildy Tontey</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Komite Sponsored Tournament</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Pramudita Munandar</p>
              <p class="pengurus-anggota-kiri"><b>Wakil Ketua : </b>Widi Pancono</p>
              <p class="pengurus-jabatan-kiri">Anggota : </p>
              <p class="pengurus-anggota-kiri">1. Harnanto Koeswoyo<br>2. Effi Wibowo<br>3. William Mamudi</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="pengurus-bidang-kanan">Komite Training For Trainers</p><br>
              <p class="pengurus-anggota-kanan"><b>Ketua : </b>Herman Daniel Ibrahim</p>
              <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Julius Antonius George</p>
              <p class="pengurus-jabatan-kanan">Anggota : </p>
              <p class="pengurus-anggota-kanan">Said Zulhasri</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Komite Bridge Online</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Ronny Aek Lontoh</p>
              <p class="pengurus-jabatan-kiri">Anggota : </p>
              <p class="pengurus-anggota-kiri">1. Bel Jaloerdi<br>2. Kartika Sakti</p><br>
          </div>
          <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="pengurus-bidang-kanan">Komite Master Point, Keanggotaan & IT</p><br>
              <p class="pengurus-anggota-kanan"><b>Ketua : </b>Bunawan</p>
              <p class="pengurus-anggota-kanan"><b>Wakil Ketua : </b>Fakhri</p>
              <p class="pengurus-jabatan-kanan">Anggota : </p>
              <p class="pengurus-anggota-kanan">1. Dr Alfatihah Reno MNS<br>2. Syahrial Ali<br>
              3. Nafi Laksmana Dirgayusa<br>4. Syarif Syahrial</p><br>
          </div>
        </div> 
        <hr>
        <div class="row">
          <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="pengurus-bidang-kiri">Sekretariat / Biro Eksekutif</p><br>
              <p class="pengurus-anggota-kiri"><b>Ketua : </b>Tetty Petricola</p>
              <p class="pengurus-anggota-kiri"><b>Sekretaris 1 : </b>Robert Soesono</p>
              <p class="pengurus-anggota-kiri"><b>Sekretaris 2 : </b>Yulian Tosra</p>
              <p class="pengurus-anggota-kiri"><b>Sekretaris 3/Keuangan : </b>Salvina Rosi</p>
              <p class="pengurus-anggota-kiri"><b>Dokumentasi/Filing : </b>Satriyo Hutomo</p><br>
          </div>      
        </div>      
    </div>
  </div>
</center>

@endsection
