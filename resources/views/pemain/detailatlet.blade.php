@extends('layouts.app')

@section('content')


<div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Home</a></li>
      <li><a href="{{ url('detailatlet') }}">Detail Atlet</a></li>
    </div>
  </div>
</div>

<center>
  <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
      <div class="widget archieve">
        <h3>Atlet Bridge</h3>
        
    </div>
  </div>
</center>

@endsection
