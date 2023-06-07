@extends('layouts.app-with-autocomplete')
@section('content')


{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

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
              <div class="alert alert-danger" role="alert">
                  {{ session('status') }}
              </div>
          @endif
            <div class="table-responsive">
                <h1>Form Pendaftaran {{ $kejuaraan->nama }}</h1>
                
                <form class="form-horizontal" action="{{ url("pendaftaran/kejuaraan/storePendaftaran") }}" method="POST" enctype="multipart/form-data" >
                  {!! csrf_field() !!}

                  <div class="form-group"> 
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="selectKU" name='selectKU' class="form-control" onchange="changeTampilan()" required>
                        <option value="" disabled selected>Pilih KU</option>
                        @foreach($detailKejuaraans as $dk)
                        <option value="{{ $dk->ku }}:{{ $dk->jenis }}:{{ $dk->id }}">{{ $dk->ku }} - {{ $dk->jenis }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  @if($kejuaraan->CC == 1)
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">CC :</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" name="fileCC" required>
                    </div>
                  </div>
                  @endif
                  <div class="form-group"> 
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Team</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id='auto' name="namateam" class="form-control" required>
                    </div>
                  </div>
                  <p id="modif"></p>
                  <p id="change"></p>
                  <div class="form-group">
                    <div class="col-md-3 col-md-offset-5">
                      <input type="submit" name='submit' value="Simpan" class="btn btn-primary"/>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div id ='bla'></div>
</div>
</section>
<script type="text/javascript">
  function changeTampilan() {
    var valueSelected = document.getElementById("selectKU").value;  
    var array = valueSelected.split(":");
    var angka = 0;
    var npc = false;
    $("#modif").html("");
    $('#change').html("");
    if(array[1] == "Perkelompok"){
      angka = 2;
    }
    else if(array[1] == "Team"){
      angka = 6;
      npc = true;
    }
    for (var i = 1; i <= angka; i++) {
      if(i <= 4)
      {
        $('#modif').append("<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Atlet "+ i +"</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='auto"+i+"' name='atlet"+ i +"' class='form-control ui-autocomplete-input' required autocomplete ='off'></div></div>");
        reload(i);
      }
      else{
        $('#modif').append("<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Atlet "+ i +"</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='auto"+i+"' name='atlet"+ i +"' class='form-control ui-autocomplete-input' autocomplete ='off'></div></div>");
        reload(i);
      }
    }
    if(npc == true){
      $('#modif').append("<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Sebagai</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='radio' id='sebagai' name='sebagai' value='pc' onclick="+"changeText('pc')"+" required>PC<br><input type='radio' id='sebagai' name='sebagai' value='npc' onclick="+"changeText('npc')"+">NPC</div></div>");
    }
    //var newarr = array[0].split("-");
    //var um = newarr[1];
    //refreshAuto(array[2], um);
  };
</script>
<script type="text/javascript">
  function changeText(text) {
    if(text == 'pc'){
      $('#change').html("<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Official</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='auto0' name='official' class='form-control ui-autocomplete-input' required autocomplete ='off'></div></div>");
      reload(0);
    }
    else{
      $('#change').html("<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Official</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='official' name='official' class='form-control' required></div></div>");
    }
  }
</script>
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script>
  function reload(i){
    <?php 
      $cp = [];
      foreach($pemains as $p){
        if($p->value != null){
          array_push($cp, $p->value);
        }
      }
    ?>
    $(function(){
        var arrpemain = <?php echo json_encode($cp) ?>;
        $("#auto"+i).autocomplete({
          source: arrpemain
        });
    });
    
  };
</script>
@endsection