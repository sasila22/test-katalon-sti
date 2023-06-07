@extends('layouts.app')

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

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="{{ url('home') }}">Home</a></li>
        <li><a href="{{ url('kejuaraan') }}">Kejuaraan</a></li>
        <li><a href="{{ url('show') }}">Detail Kejuaraan</a></li>
      </div>
    </div>
  </div>

    <center>
      <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
          <div class="widget archieve">
            <h3>{{ $kejuaraans->nama }}</h3>
             <img src="{{ asset($kejuaraans->gambar) }}" class="img-thumbnail">
             
                
        </div>
      </div>
    </center>
     
@endsection

