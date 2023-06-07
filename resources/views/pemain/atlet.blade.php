@extends('layouts.app')

@section('content')

  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
      background-color: #4CAF50;
      color: white;
    }
    td {
      color: black;
    }
</style>

  <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="{{ url('home') }}">Home</a></li>
        <li><a href="{{ url('pemain') }}">Pemain</a></li>
      </div>
    </div>
  </div>

    <center>
      <div class="progress-wrap" style="border: 2px solid black; border-radius: 10px; border-color: #1BBD36; width: 70%; height: auto; padding-left: 10px;padding-right: 10px; margin-bottom: 10px; margin-top: 10px">
          <div class="widget archieve">
            <h3>Daftar Atlet</h3>
              <table id="initabel" class="display table table-bordered table-hover table-striped table-responsive-md">
                <THEAD>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Foto</th>
                    <th style="text-align: center;">Nama Depan</th>
                    <th style="text-align: center;">Nama Belakang</th>
                    <th style="text-align: center;">Jenis Kelamin</th>
                    <th style="text-align: center;">Tempat Lahir</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
                    <th style="text-align: center;">Asal Club</th>

                  </tr>
                  </THEAD>
                  <tbody>
                    <tr>

                  @foreach ($pemains as $key => $pemain)
                <td class="text-center">{{ $key+1 }}</td>
                <td class="text-center"><img src="{{ $pemain->foto }}" style="width:100px" class="img-thumbnail"></td>
                <td class="text-center">{{ $pemain->nama_depan }}</td>
                <td class="text-center">{{ $pemain->nama_belakang }}</td>
                <td class="text-center">{{ $pemain->jeniskelamin }}</td>
                <td class="text-center">{{ $pemain->tempat_lahir }}</td>
                <td class="text-center">{{ $pemain->tanggal_lahir }}</td>
                <td class="text-center">{{ $pemain->clubs->nama }}</td>
                   
                  </tr>
                </tbody>
                  @endforeach
                </table>
        </div>
      </div>
    </center>
     
@endsection
@section('scriptabel')
<script type="text/javascript">
  $(function() {
    $('#initabel').dataTable({
      "processing": true,
      "language" : {"url" : "{{ asset('DataTables-1.10.18/bahasa/Indonesian.json') }}" }
    });
  });

  $(".hapus").click(function(){
    return confirm("Do you want to delete this item?");
  });
</script>

@endsection
