@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
        <h1>Kejuaraan</h1>
        @if (session('status'))
            <div style="background-color: green; color: white; font-weight: bold">
            {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{!! action('KejuaraanController@create') !!}">TAMBAH</a>
        <br>
        <br>
    
        <table id="prestasis-table" class="table table-bordered table-hover table-striped">
            <THEAD>
            <tr class="success">
                <th class="text-center" >ID</th>
                <th class="text-center" >Nama</th>
                <th class="text-center" >Tanggal</th>
                <th class="text-center" >Lokasi</th>
                <th class="text-center" >Keterangan</th>
                <th class="text-center" >Edit</th>
                <th class="text-center" >Delete</th>

            </tr>
            </THEAD>
            <TBODY>
            @foreach ($kejuaraans as $key => $kejuaraan)
            <tr>
                <td class="text-center">{{ $kejuaraan->id}}</td>
                <td class="text-center">{{ $kejuaraan->nama}}</td>
                <td class="text-center">{{ $kejuaraan->tanggal}}</td>
                <td class="text-center">{{ $kejuaraan->lokasi}}</td>
                <td class="text-center">{{ $kejuaraan->keterangan}}</td>
               

                
                <td class="text-center"><a class="btn btn-warning" href="{!! action('KejuaraanController@edit', $kejuaraan->id) !!}">UBAH</a></td>
                
                <td class="text-center">
                    <form action="{{ route('kejuaraani.destroy', $kejuaraan->id) }}" method="POST" class="hapus"> 
                    {{ method_field("DELETE") }} 
                    {{ csrf_field() }} 
                    <input class="btn btn-danger" type="submit" value="HAPUS" name="submit"/> 
                    </form> 
                </td>
            
            </tr>
            @endforeach
            </TBODY>
        </table>

    </div>
</div>
</div>
@endsection

@section('foot_script')
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