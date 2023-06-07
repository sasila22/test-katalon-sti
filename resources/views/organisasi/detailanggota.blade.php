@extends('layouts.app-master')

@section('content')
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
td {
  color: black;
}
</style>

<!-- <div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Home</a></li>
      <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
      <li>Pengurus Gabsi Jatim</li>
    </div>
  </div>
</div> -->

<center>
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
    <div class="widget archieve">
      <h3>GABUNGAN BRIDGE SELURUH INDONESIA</h3>
      <h3>PENGURUS PROVINSI JAWA TIMUR</h3>
      <h5>Sekretariat : Kampus Universitas Surabaya - Jurusan Teknik Informatika Ruang TC 2.1 - Jl. Kalirungkut – SURABAYA </h5>
      <h5>Tilp. 031-2981395 – Email : gabsijatim@yahoo.co.id</h5>
      <hr>
      <h3>SURAT KEPUTUSAN</h3> 
      @foreach($periode as $p)
        <h5>Nomor: {{ $p->SK }}</h5>
      @endforeach
      <h3>Tentang</h3>
      @foreach($daerah as $namadaerah)
        <h3>SUSUNAN PENGURUS GABUNGAN BRIDGE {{ $namadaerah->kabupaten_kota}}</h3>
      @endforeach
      @foreach($periode as $d)
        <?php
          $thn_awal = Carbon\Carbon::parse($d->masa_bakti_awal)->format('Y');
          $thn_akhir = Carbon\Carbon::parse($d->masa_bakti_akhir)->format('Y'); 
        ?>
        <h3>Periode {{ $thn_awal }} - {{ $thn_akhir }}</h3>
      <hr>
      <?php
      $tgl_akhir = Carbon\Carbon::parse($d->masa_bakti_akhir)->format('d');
      $bln_akhir = Carbon\Carbon::parse($d->masa_bakti_akhir)->format('m');
      $thn_akhir = Carbon\Carbon::parse($d->masa_bakti_akhir)->format('Y');

      // mengatur time zone untuk WIB.
      date_default_timezone_set("Asia/Jakarta");

      // mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
      $selisih1 =  mktime(0, 0, 0, $bln_akhir, $tgl_akhir, $thn_akhir);

      // mencari mktime untuk current time
      $selisih2 = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));

      // mencari selisih detik antara kedua waktu
      $delta = $selisih1 - $selisih2;

    // proses mencari jumlah hari
      $a = floor($delta / 86400);

      if ($a <= 180) {
        echo "<div id='hasil'><h3 style='color:red;'> SK berlaku hingga ". $d->masa_bakti_akhir ." yaitu : -".$a." hari lagi </h3></div>";
      }
      elseif($a = 0) {
        echo "<div id='hasil'><h3 style='color:red;'> SK telah kedaluarsa pada tanggal ". $d->masa_bakti_akhir ."</h3></div>";
      }
      else{
        echo "<div id='hasil'><h3 style='color:green;'> SK berlaku hingga ". $d->masa_bakti_akhir ." </h3></div>";

      }
      
      ?>
      @endforeach
    </div>

    <table id="anggota" >
        <thead>
          <tr>
            <th>Nama Anggota</th>
            <th>Jabatan</th>
          </tr>
        </thead>
        <tbody>
        @foreach($anggota as $a)
        <tr>
          <td>{{ $a->nama}}</td>
        <td>{{$a->nama_divisi}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
  </div>

</center>

@endsection
