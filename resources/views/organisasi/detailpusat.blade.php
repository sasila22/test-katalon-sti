@extends('layouts.app-master')

@section('content')

<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Home</a></li>
      <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
      <li>Pengurus Pusat</li>
    </div>
  </div>
</div>

<center>
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
    <div class="widget archieve">
      @foreach ($gabsis as $key => $g)
      <h3>PENGURUS GABSI PUSAT</h3>
      <hr>

      <?php
      $thn_awal = Carbon\Carbon::parse($g->masa_bakti_awal)->format('Y');
      $thn_akhir = Carbon\Carbon::parse($g->masa_bakti_akhir)->format('Y'); 
      ?>

      <h3>Periode {{ $thn_awal }} - {{ $thn_akhir }}</h3>

      <?php

      $tgl_akhir = Carbon\Carbon::parse($g->masa_bakti_akhir)->format('d');
      $bln_akhir = Carbon\Carbon::parse($g->masa_bakti_akhir)->format('m');
      $thn_akhir = Carbon\Carbon::parse($g->masa_bakti_akhir)->format('Y');

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
        echo "<div id='hasil'><h3 style='color:red;'> SK berlaku hingga ". $g->masa_bakti_akhir ." yaitu : -".$a." hari lagi </h3></div>";
      }
      elseif($a = 0) {
        echo "<div id='hasil'><h3 style='color:red;'> SK telah kedaluarsa pada tanggal ". $g->masa_bakti_akhir ."</h3></div>";
      }
      else{
        echo "<div id='hasil'><h3 style='color:green;'> SK berlaku hingga ". $g->masa_bakti_akhir ." </h3></div>";

      }

      ?>

      <img style="width: 25px" src="{{ asset('images/logo/house.png') }}" > <h4>{{ $g->alamat }}</h4>
      <img style="width: 25px" src="{{ asset('images/logo/call.png') }}" > <h4>{{ $g->no_tlp }}</h4>
      <img style="width: 25px" src="{{ asset('images/logo/email.png') }}" ><h4>{{ $g->email }}</h4>
      
      @endforeach
    </div>

    <h3>Struktur Pengurus</h3>
    @foreach ($strukturs as $key => $s)
    <?php
    $id_pengurus = $s->id_strukture;
    ?>
    @endforeach

    @if($id_pengurus == null)
    <h4>Data Struktur Pengurus Belum Ada.</h4>
    @else
    <table class="table">
      <tr>
      @foreach($count as $v)
      <td rowspan = '{{ $v->hitung }}'>{{ $v->namaDivisi }}</td>
        @foreach($pengurus as $p)
          @if($p->divisi == $v->namaDivisi)
            <td>{{$p->namaorg}}</td>
            <td>{{$p->jabatan}}</td>
          </tr><tr>
          @endif
        @endforeach
      @endforeach
    </tr>
    </table>
    @endif
  </div>
</center>



@endsection
