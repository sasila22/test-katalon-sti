@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>Edit Organisasi</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ route('gabsi.update',$gabsis->id) }}" method="POST" enctype="multipart/form-data">
				{{method_field("PUT")}}
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="namaa" class="form-control" required autofocus value="{{$gabsis->nama}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="alamatt" class="form-control" required autofocus value="{{$gabsis->alamat}}">
					</div>
				</div>
			
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telp</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="telp" class="form-control" required autofocus value="{{$gabsis->no_tlp}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="emaill" class="form-control" required autofocus value="{{$gabsis->email}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="file" name="foto" class="form-control" required autofocus value="{{$gabsis->foto}}">
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select name="keterangan" class="form-control" > 
						<option value ="Pusat"> Pusat </option>
						<option value ="Jatim"> Jatim </option>
						<option value ="Kota"> Kota </option>
						<option value ="Kabupaten"> Kabupaten </option>
						</select>
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