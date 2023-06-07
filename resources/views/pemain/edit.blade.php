@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
		<div class="x_title">
			<center><h2>EDIT ANGGOTA CLUB</h2></center>
			<div class="clearfix"></div>
		</div>

		<div class="x_content"> 

			<form class="form-horizontal" action="{{ route('pemaini.update',$pemains->id) }}" method="POST" enctype="multipart/form-data">
				{{method_field("PUT")}}
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Depan</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="namadpn" class="form-control" required autofocus value="{{$pemains->nama_depan}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Belakang</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="namablkg" class="form-control" required autofocus value="{{$pemains->nama_belakang}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="jenisklmn" class="form-control" >
							@if ($pemains->jeniskelamin == "Laki-laki")
							<option value ="Laki-laki" selected> Laki-laki </option>
							<option value ="Perempuan"> Perempuan </option>
							@else
							<option value ="Laki-laki"> Laki-laki </option>
							<option value ="Perempuan" selected> Perempuan </option>
							@endif
						</select>
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="tmptlahir" class="form-control" required autofocus value="{{$pemains->tempat_lahir}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="tgllahir" class="form-control" required autofocus value="{{$pemains->tanggal_lahir}}">
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Club</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select name="club" class="form-control" > 
							@foreach($gabsis as $gabsi)	
							<option value ="{{$gabsi->id}}"> {{$gabsi->nama}} </option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="file" name="foto" class="form-control" required autofocus value="{{$pemains->foto}}">
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