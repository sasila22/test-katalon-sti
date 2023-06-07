@extends('layouts.app-admin')
@section('content')

@foreach ($errors ->all() as $error)
	<h4 style="color: red">{{ $error }}</h4>
@endforeach
<div class="row">
	<div class="x_panel">
	  	<div class="x_title">
	    	<center><h2>Tambah Periode</h2></center>
	    	<div class="clearfix"></div>
	  	</div>

	  	<div class="x_content"> 

			<form class="form-horizontal" action="{{ url('periode') }}" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<input type="hidden" name="token" id="token" value="{{ csrf_token() }}" /><br>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">No. SK</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="nosk" class="form-control" required autofocus>
					</div>
				</div>
				
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Berlaku</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="tgla" class="form-control" required autofocus>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Berakhir</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="tglb" class="form-control" required autofocus>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Muskabkot</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="muskabkot" class="form-control" required autofocus>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="tglsurat" class="form-control" required autofocus>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">No. Surat</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" name="nosurat" class="form-control" required autofocus>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Rekom Koni</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="date" name="rekomkoni" class="form-control" required autofocus>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Organisasi</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select name="organisasi" class="form-control" >
							@foreach($periodes as $key => $p )
							<option value ="{{ $p->id_gabsis }}"> {{ $p->namaorg }} </option>
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