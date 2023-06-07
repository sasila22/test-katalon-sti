@extends('layouts.app-admin')

@section('content')

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Gabsi</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Gabsi Jatim</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DAFTAR MENU</li>
    @if (Route::has('login'))
      @if (Auth::check())
        @if(Auth::user()->status == '0')
        <li class="active">
          <a href="{{ url('home') }}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('berita') }}"><i class="fa fa-list"></i> Daftar Berita</a></li>
            <li><a href="{{ url('berita/create') }}"><i class="fa fa-plus-square-o"></i> Tambah Berita</a></li>
          </ul>
        </li>

        <li>
          <a href="{{ url('komentar') }}">
            <i class="fa fa-comments-o"></i> <span>Komentar</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-trophy"></i>
            <span>Kejuaraan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('kejuaraan') }}"><i class="fa fa-list"></i> Daftar Kejuaraan</a></li>
            <li><a href="{{ url('kejuaraan/create') }}"><i class="fa fa-plus-square-o"></i> Tambah Kejuaraan</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-star"></i>
            <span>Prestasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('prestasi') }}"><i class="fa fa-list"></i> Daftar Prestasi</a></li>
            <li><a href="{{ url('prestasi/create') }}"><i class="fa fa-plus-square-o"></i> Tambah Prestasi</a></li>
          </ul>
        </li>

        <li>
          <a href="{{ url('infor') }}">
            <i class="fa fa-info-circle"></i> <span>Info Berita</span>
          </a>
        </li>

        <li>
          <a href="{!! action('TentangkamiController@edit', 1) !!}">
            <i class="fa fa-users"></i> <span>Tentang Kami</span>
          </a>
        </li>

        <hr>
        
        <li>
          <a href="{{ url('gabsi') }}">
            <i class="fa fa-info-circle"></i> <span>Data Organisasi</span>
          </a>
        </li>

        <li>
          <a href="{{ url('periode') }}">
            <i class="fa fa-info-circle"></i> <span>Periode Organisasi</span>
          </a>
        </li>

        <li>
          <a href="{{ url('struktur') }}">
            <i class="fa fa-info-circle"></i> <span>Struktur Organisasi</span>
          </a>
        </li>

        <li>
          <a href="{{ url('jabatan') }}">
            <i class="fa fa-info-circle"></i> <span>Jabatan</span>
          </a>
        </li>

        <li>
          <a href="{{ url('club') }}">
            <i class="fa fa-info-circle"></i> <span>Club</span>
          </a>
        </li>

        <li>
          <a href="{{ url('user') }}">
            <i class="fa fa-info-circle"></i> <span>Admin Kota / Kabupaten</span>
          </a>
        </li>
        @elseif (Auth::user()->status == '2')
        <li>
          <a href="{{ url('pemaini') }}">
            <i class="fa fa-info-circle"></i> <span>Anggota Club</span>
          </a>
        </li>
        <li>
          <a href="{{ url('pendaftaran/kejuaraan') }}">
            <i class="fa fa-info-circle"></i> <span>Pendaftaran Tournament</span>
          </a>
        </li>
        <li>
          <a href="{{ url('prestasi') }}">
            <i class="fa fa-info-circle"></i> <span>Prestasi</span>
          </a>
        </li>
        <li>
          <a href="{{ url('kejuaraan/pendaftar/listDiikuti') }}">
            <i class="fa fa-info-circle"></i> <span>Lomba yang diikuti</span>
          </a>
        </li>
        @endif
      @endif
    @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- INI KONTEN -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content">
  <h2>Ubah Data Prestasi</h2>

  <form class="form-horizontal" method="post" action="{{ route('prestasi.update', $prestasi->id_prestasi)}}">
  {!! csrf_field() !!}
  {{ method_field("PUT") }}


           

  

    <div class="form-group">
    <label class="control-label col-sm-2" for="id_kejuaraan">ID Pertandingan:</label>
      <div class="col-sm-10">
        <select class="form-control" id="id_kejuaraan" name="id_kejuaraan">
        @foreach($kejuaraan as $p)
        <option value="{{ $p->id }}">{{$p->nama}}</option>
        @endforeach        
        </select>
      </div>
    </div> 

    
    <div class="form-group">  
    <label class="control-label col-sm-2" for="id_pemain">ID Pemain:</label>
      <div class="col-sm-10">
        <select class="form-control" id="id_pemain" name="id_pemain">
        @foreach($pemain as $a)
        <option value="{{ $a->id }}">{{$a->nama_depan}} {{$a->nama_belakang}}</option>
        @endforeach
        </select>
      </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-2" for="pres">Prestasi Medali atau Peringkat:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pres" placeholder="Enter  prestasi" name="pres" value="{{ $prestasi->prestasi_peringkat }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nom">Nomor Spesialis:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nom" placeholder="Enter nomor spesialis" name="nom" value="{{ $prestasi->nomor_spesialis }}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="keterangan">Keterangan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="keterangan" placeholder="Enter keterangan prestasi" name="keterangan" value="{{ $prestasi->keterangan }}">
      </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="{{ route('prestasi.index')}}" class="btn btn-primary"> Kembali </a>
      </div>
  </form>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="{{ url('/home') }}">Gabsi Jatim</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

@endsection