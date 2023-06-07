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
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
    <div class="widget archieve">

      @foreach ($gabsis as $key => $g)
      <h3>PENGURUS GABSI DI {{ $g->nama }}</h3>
      <hr>
      <h5 style="text-align: left;">Pilih Periode :</h5>
      <?php
      $id_gabsi = $g->id;
      ?>

      
      <form id="jatim" action="{{ url('detailkabkot') }}" method="POST" style="display: block;">
        {!! csrf_field() !!}
        <select name="periode"class="form-control">
          @foreach ($periodes as $key => $p)
          <?php
          $thn_awal = Carbon\Carbon::parse($p->masa_bakti_awal)->format('Y');
          $thn_akhir = Carbon\Carbon::parse($p->masa_bakti_akhir)->format('Y');
          ?>

          <option value="{{ $p->id_periode }}"> <?php echo $thn_awal; ?> - <?php echo $thn_akhir; ?></option>
          @endforeach
          
        </select>
        <input name="id_gabsi" value="<?php echo $id_gabsi; ?>" hidden="">
        <br>
        <button type="submit" class="btn btn-primary">TAMPIL</button>
      </form>
      @endforeach

      

      

    </div>
  </div>
</center>

@endsection
