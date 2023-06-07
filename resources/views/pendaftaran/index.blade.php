@extends('layouts.app-admin')

@section('content')
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('home') }}" class="logo">
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
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
  <div class="content-wrapper">
  <section class="content">
    <div class="row">
        <div class="col-lg-12">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
            <div class="table-responsive">
                <h1>Kejuaraan</h1>
            <br>
            @if(count($kejuaraans) == 0)
                <h2 style="text-align: center;">Belum ada daftar kejuaraan</h2>
            @else
            <table id="prestasis-table" class="table table-bordered table-hover table-striped">
                <THEAD>
                <tr class="success">
                    <th class="text-center" >ID</th>
                    <th class="text-center" >Nama</th>
                    <th class="text-center" >Tanggal Tutup Pendaftaran</th>
                    <th class="text-center" >Tanggal Mulai</th>
                    <th class="text-center" >Tanggal Akhir</th>
                    <th class="text-center" >Lokasi</th>
                    <th class="text-center" >Keterangan</th>
                    <th class="text-center" >Gambar</th>
                    <th class="text-center" >Daftar</th>

                </tr>
                </THEAD>
                <TBODY>
                @foreach ($kejuaraans as $key => $kejuaraan)
                <tr>
                    <td class="text-center">{{ $kejuaraan->id}}</td>
                    <td class="text-center">{{ $kejuaraan->nama}}</td>
                    <td class="text-center">{{ $kejuaraan->tgl_akhir_pendaftaran}}</td>
                    <td class="text-center">{{ $kejuaraan->tgl_awal}}</td>
                    <td class="text-center">{{ $kejuaraan->tgl_akhir}}</td>
                    <td class="text-center">{{ $kejuaraan->lokasi}}</td>
                    <td class="text-center">{{ $kejuaraan->keterangan}}</td>
                    <td><img src="{{ url('foto/kejuaraan/'.$kejuaraan->foto) }}" style="width: 150px; height: 150px;"></td>
                   

                    
                    <td class="text-center"><a class="btn btn-success" href="{{ url('pendaftaran/kejuaraan/formulirPendaftaran/'.$kejuaraan->id.'/'.Auth::user()->id) }}">Daftar</a></td>
                
                </tr>
                @endforeach
                </TBODY>
            </table>
            @endif
        </div>
    </div>
</div>
</section>
</div>
<footer class="main-footer">
      <strong>Copyright &copy; 2018 <a href="{{ url('/home') }}">Gabsi Jatim</a>.</strong> All rights
      reserved.
    </footer>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(".hapus").click(function(){
        return confirm("Anda yakin untuk menghapus data ini?");
    });

</script>
<script>
  $(function () {
    $('#prestasis-table').DataTable({
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