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
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
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
        Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('kejuaraan') }}" class="active"><i class="fa fa-dashboard"></i> Absensi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- INI KALENDER -->
          <!-- <div class="box box-primary"> -->
            <!-- <div class="box-body no-padding"> -->
            <!-- /.box-body -->
          <!-- </div> -->
        </div>

        
        <div class="col-md-12">
          <!-- INI TABLENYA -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pendaftar {{ $kejuaraan->nama }}</h3>
              @if(session('status'))
                <div style="background-color:green; color:white;font-weight: bold">
                  {{session('status')}}
                </div>
              @endif
            </div>
            <!-- /.box-header -->
          <div class="table-responsive">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Team</th>
                  <th>KU</th>
                  <th>Jenis</th>
                  <th>Gabsi</th>
                  <th>Pembayaran</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pendaftars as $key => $pendaftar)
                <?php 
                  $temp = explode(' ',$kejuaraan->created_at);
                ?>
                <tr id='tr_{{ $pendaftar->id }}'>
                  <td>{{ $key+1 }}</td>
                  <td> <a href='{{ url('kejuaraan/pendaftar/detail/'.$pendaftar->id)}}'>{{ $pendaftar->namaTeam }}</a></td>
                  <td>{{ $pendaftar->detailKU }}</td>
                  <td>{{ $pendaftar->detailJenis }}</td>
                  <td>{{ $pendaftar->gabsi }}</td>
                  @if($pendaftar->statusPembayaran == 0)
                    <td class="actions" id="td_{{ $pendaftar->id }}" data-th="">
                        <a class="btn btn-success btn-sm update-cart" data-id="{{ $pendaftar->id }}" 
                            onclick="if(confirm('apakah anda yakin sudah melakukan pembayaran?')){buktiData({{$pendaftar->id}})}">Konfirmasi</a>
                    </td>
                  @else
                  <td>
                    Sudah Bayar
                  </td>
                  @endif
                  @if($pendaftar->buktiPembayaran != "")
                    <td class="actions" id="td2_{{ $pendaftar->id }}" data-th="">
                      <a class="btn btn-success btn-sm update-cart" href="{{ url('buktiPembayaran/'.$pendaftar->buktiPembayaran) }}" target='blank'>Lihat Bukti</a>
                    </td>
                  @else
                    <td id="td2_{{ $pendaftar->id }}">
                      @if($pendaftar->statusPembayaran == 0)
                        Belum ada bukti Pembayaran
                      @else
                        Bayar Cash
                      @endif
                    </td>
                  @endif
                    <td class="actions" data-th="">
                        <a class="btn btn-danger btn-sm update-cart" href='{{url('kejuaraan/absensi/listTeam/'.$pendaftar->id)}}'>Absensi</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Team</th>
                  <th>KU</th>
                  <th>Jenis</th>
                  <th>Pembayaran</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="{{ url('home') }}">Gabsi Jatim</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
@section('script')

<!-- SCRIPT BUAT DATATABLE -->
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'scrollX'     : true
    })
    
  })
</script>
<script type="text/javascript">
    function buktiData(id){
        $.ajax({
          type:'POST',
          url:'{{url("kejuaraan/pendaftar/konfirmasibayar")}}',
          data:{'_token':'<?php echo csrf_token() ?>',
          'id':id,
        },
        success: function(data){
            if(data.status=='oke'){
              $('#td_'+id).html('Sudah Bayar');
              if(data.buktiPembayaran == 1){
                $('#td2_'+id).html('Bayar Cash');
              }

              alert(data.msg);
            }
            else{
              alert(data.msg);
            }
          }
        });
      }
</script>
@endsection
@endsection