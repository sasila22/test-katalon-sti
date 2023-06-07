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

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DAFTAR MENU</li>
        <li>
          <a href="{{ url('/home') }}">
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
            <li><a href="{{ url('berita') }}"><i class="fa fa-list" class="active"></i> Daftar Berita</a></li>
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
            <i class="fa fa-file-image-o"></i>
            <span>Galeri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('galeri') }}"><i class="fa fa-list"></i> Daftar Galeri</a></li>
            <li><a href="{{ url('galeri/create') }}"><i class="fa fa-plus-square-o"></i> Tambah Galeri</a></li>
          </ul>
        </li>

        <!-- <li class="treeview">
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

        <li>
          <a href="{{ url('infor') }}">
            <i class="fa fa-info-circle"></i> <span>Info Berita</span>
          </a>
        </li>

        <li>
          <a href="{!! action('TentangkamiController@edit', 1) !!}">
            <i class="fa fa-users"></i> <span>Tentang Kami</span>
          </a>
        </li> -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<!-- INI KONTEN -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Galeri
      </h1>
      <ol class="breadcrumb">
        <li><a href="#" class="active"><i class="fa fa-dashboard"></i> Edit Galeri</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Galeri</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach ($errors ->all() as $error)
              <h4 style="color: red;">{{ $error }}</h4>
            @endforeach
            @if (session('status')) 
		 	        <h4 style="color: green;">{{ session('status') }}</h4>
		 	      @endif 

            <form role="form" action="{{ route('galeri.update', $g->id) }}" method="POST" enctype="multipart/form-data">
            {{ method_field("PUT") }} 
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label>Judul Foto/Video :</label>
                  <input type="text" class="form-control" name="judul" value="{{ $g->judul }}" maxlength="50">
                  <p class="help-block">Max karakter : 50</p>
                </div>

                <div class="form-group">
                  <label>Keterangan Foto/Video :</label>
                  <input type="text" class="form-control" name="ket" value="{{ $g->ket }}" maxlength="70">
                  <p class="help-block">Max karakter : 70</p>
                </div>

                <div class="form-group">
                  <label>Jenis :</label>
                  <select class="form-control" name="status" required>
                    @if($g->status == 0)
                    <option value="0" selected>Foto</option>
                    <option value="1">Video</option>
                    @elseif($g->status == 1)
                    <option value="0">Foto</option>
                    <option value="1" selected>Video</option>
                    @endif
                  </select>
                  <p class="help-block">Pilih jenis file yang diupload</p>
                </div>

                <div class="form-group">
                  <label>Upload Foto/Video :</label>
                  <input type="file" name="foto" value="{{ $g->file }}">
                  <p class="help-block">Pilih File Foto/Video Untuk Diubah dan Jangan Pilih Foto Jika Tidak Ingin Diubah</p>
                </div>

                <div class="form-group" hidden="">
                  <input type="text" name="penulis" value="{{ Auth::user()->id }}">
                </div>
              
              <!-- /.box-body -->

	            <div class="form-group">
	               <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
	            </div>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="{{ url('/home') }}">Gabsi Jatim</a>.</strong> All rights
    reserved.
  </footer>
</div>
@section('script')
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
  })
</script>
@endsection
@endsection