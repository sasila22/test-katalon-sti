
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
     <h2>Input Data Jabatan</h2>
	     <form class="form-horizontal" action="{{ url('jabatan') }}" method="POST" enctype="multipart/form-data">
							{!! csrf_field() !!}

	    <div class="form-group">
	    <table  class="table table-hover table-bordered small-text" id="tsc">
	        <div style="border: 1px solid black;">
	        <tr class="tr-header">
	          <th>Periode</th>
	          <th>Struktur</th>
	          <th>Jabatan</th>
	          <th>Divisi</th>
	          <th><a href="javascript:void(0);" style="font-size:18px;" id="addMoretsc" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
	        </tr>
	        <tr>              
	          <td>
	            <select class="form-control" id="id_periode" name="id_periode[]">
	            @foreach($periodes as $periode)		
					<option value="{{ $periode->id }}">{{ $periode->gabsis->nama }} {{ $periode->ubahTahun($periode->masa_bakti_awal) }} - {{  $periode->ubahTahun($periode->masa_bakti_akhir) }}</option>
				@endforeach                       
	          </td>
	          <td>
	            <select class="form-control" id="id_struktur" name="id_struktur[]">
	            @foreach($strukturs as $struktur)		
					<option value="{{ $struktur->id }}"> {{ $struktur->nama }} </option>
				@endforeach                     
	          </td>
	          <td>
	            <input type="text"  name="jabatan[]" id="jabatan" class="form-control meja xmeja" required>
	          </td>
	          <td>
	            <input type="text"  name="divisi[]" id="divisi" class="form-control meja xmeja" required>
	          </td>

	          <td>
	            <a href='javascript:void(0);'  class='removetsc'><i style="font-size: 18px;" class='glyphicon glyphicon-remove'></i></a>
	          </td>
	        </tr>
	        </div>
	      </table>
	    </div>
	    <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-default">Submit</button>
	        <a href="{{ route('jabatan.index')}}" class="btn btn-primary"> Kembali </a>
	    </div>
	  </form>
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


<script type="text/javascript">
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
  });
    $(function(){

      $('#addMoretsc').on('click', function() {

          var data = $("#tsc tr:eq(1)").clone(true).appendTo("#tsc");
          data.find("input").val('');

      });

      $(document).on('click', '.removetsc', function() {
          var trIndex = $(this).closest("tr").index();
              if(trIndex>1) {

                $(this).closest("tr").remove();

              } 
              else {

              alert("Tidak bisa menghapus input pertama.");

              }
        });
    }); 
</script>
@endsection
@endsection