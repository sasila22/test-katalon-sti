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
        Tambah Kejuaraan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('berita/create') }}" class="active"><i class="fa fa-dashboard"></i> Tambah Kejuaraan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Kejuaraan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @foreach ($errors ->all() as $error)
              <h4 style="color: red">{{ $error }}</h4>
            @endforeach
            @if (session('statussalah')) 
              <h4 style="color: red;">{{ session('statussalah') }}</h4>
            @endif
            @if (session('status')) 
              <h4 style="color: green;">{{ session('status') }}</h4>
            @endif 
            <form role="form" action="{{ url('kejuaraan') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Kejuaraan :</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kejuaraan Di Sini" required>
                  <p class="help-block">Contoh : Ubaya Bridge Cup 2018</p>
                </div>

                <div class="form-group">
                  <label>Tanggal Mulai dan Berakhir Publikasi :</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" name="publicationtime" class="form-control pull-right" id="publicationtime">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Jam Publikasi :</label>
                  <input type="number" min = "1" max ="24" class="form-control" name="jamPublikasi" required>
                  <p class="help-block">Contoh : jam 13.00 maka input 13</p>
                </div>

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Tanggal Mulai dan Berakhir Kejuaraan :</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" name="reservationtime" class="form-control pull-right" id="reservationtime">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Memerlukan CC ?</label>
                  <select class="form-control" id="cc" name="cc[]">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option> 
                  </select>  
                </div>
                <div class="form-group">
                  <label>Peserta apakah boleh bergabung antara satu kabupaten dengan kabupaten lain?</label>
                  <select class="form-control" id="bentukLomba" name="bentukLomba[]">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option> 
                  </select>  
                </div>

                <div class="form-group">
                  <label>Lokasi Kejuaraan :</label>
                  <input type="text" class="form-control" name="lokasi" placeholder="Masukkan Lokasi Kejuaraan Di Sini" required>
                  <p class="help-block">Contoh : Kampus Ubaya Tenggilis</p>
                </div>

                <div class="box-body pad">
                  <label>Keterangan :</label>
                  <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">Masukkan Keterangan Kejuaraan Dengan Lengkap Disini</textarea>
                  </form>
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label>Formulir Pendaftaran Kejuaraan :</label>
                  <input type="file" name="formulir" required>
                  <p class="help-block">Jika Ada Formulir Pendaftaran Kejuaraan Silahkan di Upload Disini. Format Formulir diharapkan PDF.</p>
                </div>
                
                <div class="form-group">
                  <label>Foto atau Poster Kejuaraan :</label>
                  <input type="file" name="foto" required>
                  <p class="help-block">Pilih Gambar Untuk Foto atau Poster Kejuaraan</p>
                </div>
                <div class="form-group" hidden="">
                  <input type="text" name="penulis" value="{{ Auth::user()->id }}">
                </div>
              
              <!-- /.box-body -->
              <div class="form-group">
                <table  class="table table-hover table-bordered small-text" id="tsc">
                                <div style="border: 1px solid black;">
                                <tr class="tr-header">
                                  <th>KU</th>
                                  <th>Jenis Perlombaan</th>
                                  <th><a href="javascript:void(0);" style="font-size:18px;" id="addMoretsc" title="Add More Person"><span class="glyphicon glyphicon-plus"></span></a></th>
                                </tr>
                                <tr>
                                  <td>
                                    <input type="number"  name="ku[]" id="ku" class="form-control meja xmeja" required>
                                  </td>              
                                  <td>
                                    <select class="form-control" id="jenis" name="jenis[]">
                                      <option value="Perkelompok">Perkelompok</option>
                                      <option value="Team">Team</option> 
                                    </select>                    
                                  </td>
                                  <td>
                                    <a href='javascript:void(0);'  class='removetsc'><i style="font-size: 18px;" class='glyphicon glyphicon-remove'></i></a>
                                  </td>
                                </tr>
                                </div>
                              </table>
                </div>

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

<!-- SCRIPT BUAT CKEDITOR / WYSIWYG -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
  })
</script>

<!-- SCRIPT BUAT DATETIME RANGE -->
<script>
  $(function () {

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    $('#publicationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })

  })
</script>
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

<!-- ./wrapper -->
@endsection