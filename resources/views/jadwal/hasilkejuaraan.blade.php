@extends('layouts.app')

@section('content')


  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="{{ url('home') }}">Home</a></li>
        <li><a href="{{ url('hasilkejuaraan') }}">Hasil Kejuaraan</a></li>
      </div>
    </div>
  </div>

    <center>
      <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
          <div class="widget archieve">
            <h3>Hasil Kejuaraan</h3>
            <div class="form-group">
              <label style="color: black; float: left;">Bulan</label>
                <div class="col-md-3">
                  <select class="form-control" >
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                  </select> 
                </div>
            </div> <br>
            <div class="form-group">
              <label style="color: black; float: left;">Kategori</label>
                <div class="col-md-3">
                  <select class="form-control" >
                    @foreach($kategoris as $kategori) 
                      <option value ="{{$kategori->id}}"> {{$kategori->nama}} </option>
                    @endforeach
                  </select> 
                </div>
            </div> 
        </div>
      </div>
    </center>

@endsection
