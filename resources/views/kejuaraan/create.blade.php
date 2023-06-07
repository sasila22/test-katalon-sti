@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>TAMBAH KEJUARAAN</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ url('kejuaraani') }}" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kejuaraan</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="namaa" class="form-control" required autofocus>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Acara</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="tanggalAcara" class="form-control" required autofocus>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="lokasi" class="form-control" required autofocus>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="keterangan" class="form-control" required autofocus>
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
@endsection