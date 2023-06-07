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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jabatan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('gabsi') }}" class="active"><i class="fa fa-dashboard"></i> Jabatan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>Edit Jabatan</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ route('jabatan.update',$jabatans->id) }}" method="POST" enctype="multipart/form-data">
				{{method_field("PUT")}}
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Periode</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select type="text" name="id_periode" class="form-control" > 
						@foreach($periodes as $periode)
						@if($jabatans->id_periode == $periode->id)		
							<option value="{{ $periode->id }}"selected>{{ $periode->gabsis->nama }} {{ $periode->ubahTahun($periode->masa_bakti_awal) }} - {{  $periode->ubahTahun($periode->masa_bakti_akhir) }}</option>
						
						@endif
						@endforeach
					</select>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Struktur</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select type="text" name="id_struktur" class="form-control" > 
						@foreach($strukturs as $struktur)
						@if($jabatans->id_struktur == $struktur->id)		
						<option value="{{ $struktur->id }}" selected > {{ $struktur->nama }} </option>
						@else
						<option value="{{ $struktur->id }}"> {{ $struktur->nama }} </option>
						@endif
						@endforeach
					</select>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="jabatan" value="{{$jabatans->jabatan}}" class="form-control" required autofocus>
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Divisi</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="divisi" class="form-control" value="{{$jabatans->divisi}}" required autofocus>
					</div>
				</div>

				<div class="form-group">
                    <div class="col-md-3 col-md-offset-5">
                        <input type="submit" value="Simpan" class="btn btn-primary"/>
                    </div>
                </div>

			</form>
		</div>
	</div>
</div>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="{{ url('/home') }}">Gabsi Jatim</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
@section('script')
<script type="text/javascript">
    $('#hapus').click(function(){
        return confirm("Data Berita beserta Komentar yang dimuat akan dihapus. Apakah Anda yakin untuk menghapus data ini?");
    });
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  })
</script>
@endsection
@endsection

