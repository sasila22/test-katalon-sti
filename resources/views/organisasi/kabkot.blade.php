@extends('layouts.app-master')

@section('content')

<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Home</a></li>
      <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
      <li>Pengurus Kabupaten & KOTA</li>
    </div>
  </div>
</div>

<center>
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 5%; margin-top: 5%">
    <div class="widget archieve">
      <h3>PENGURUS GABSI KABUPATEN DAN KOTA</h3>
      <hr>
      <h5 style="text-align: left;">Pilih Kabupaten atau Kota :</h5>
      <button class="accordion">KABUPATEN</button>
      
      <div class="panel">
        @foreach ($kabkots as $key => $kab)
        @if($kab->keterangan=='Kabupaten')
        <a href="{!! action('TitipController@kabkotperiode', $kab->id) !!}"> <p style="text-align: left;"> {{ $kab->nama }} </p></a>
        @endif
        @endforeach
      </div>
      
      <button class="accordion">KOTA</button>
      
      <div class="panel">
        @foreach ($kabkots as $key => $kot)
        @if($kot->keterangan=='Kota')
        <a href="{!! action('TitipController@kabkotperiode', $kot->id) !!}"> <p style="text-align: left;"> {{ $kot->nama }} </p> </a>
        @endif
        @endforeach
      </div>
      
    </div>
  </div>
</center>

@endsection
