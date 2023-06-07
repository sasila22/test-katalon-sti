@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>Edit Admin Kabupaten & Kota</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ route('user.update',$users->id) }}" method="POST" enctype="multipart/form-data">
				{{method_field("PUT")}}
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="username" class="form-control" required autofocus value="{{$users->name}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="email" name="email" class="form-control" required autofocus value="{{$users->email}}">
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Organisasi</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select name="id_gabsi" class="form-control" >
							<option value="{{$users->id_gabsi}}">{{$users->gabsis->nama}}</option>
							@foreach ($gabsis as $key => $g)
							<option value="{{ $g->id }}"> {{ $g->nama }} </option>
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