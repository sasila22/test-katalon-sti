@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>EDIT CLUB</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ route('club.update',$clubs->id) }}" method="POST" enctype="multipart/form-data">
				{{method_field("PUT")}}
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Club</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="namaclub" class="form-control" required autofocus value="{{$clubs->nama}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="alamat" class="form-control" required autofocus value="{{$clubs->alamat}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">No. Tlp</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="no_tlp" class="form-control" required autofocus value="{{$clubs->no_tlp}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" name="email" class="form-control" required autofocus value="{{$clubs->email}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="file" name="foto" class="form-control" required autofocus value="{{$clubs->foto}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Organisasi</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select name="asal" class="form-control" > 
						@foreach($gabsis as $gabsi)	
						<option value ="{{$gabsi->id}}"> {{$gabsi->nama}} </option>
						@endforeach
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