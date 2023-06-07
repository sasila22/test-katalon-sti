@extends('layouts.app-master')

@section('content')

<!-- <div id="breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <li><a href="{{ url('home') }}">Beranda</a></li>
      <li><a href="{{ url('pengurus') }}">Pengurus</a></li>
      <li>Pengurus Jatim</li>
    </div>
  </div>
</div> -->
<section id="blog" class="container">
    <div class="blog">
          <!-- INI TABLENYA -->
            <div class="box">
              <div class="box-header">
                <div class="container">
                  <div class="lates">
                    <div class="text-center">
                      <h2 style="font-size:32px;">Pengurus Jatim</h2>
                    </div>
                  </div>
                  <div class="box-body">
                <div style="overflow-x:auto;">
              <table id="kejuaraan" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kab/Kota</th>
                  <th>Kode Kab/Kota</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($kabupaten as $key => $kabupaten)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td><a href="{{url('detailanggota/'.$kabupaten->id)}}">{{ $kabupaten->kabupaten_kota }}</a></td>
                  <td>{{ $kabupaten->kode_daerah }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>

              </div>  
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</section>

@endsection
