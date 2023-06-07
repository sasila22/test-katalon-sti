@extends('layouts.app-master')

@section('content')


      <header>
        
      </header>

      <div id="breadcrumb">
        <div class="container">
          <div class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li>Pengurus</li>
          </div>
        </div>
      </div>

<section id="blog" class="container">
    <div class="blog">
          <!-- INI TABLENYA -->
            <div class="box">
              <div class="box-header">
                <div class="container">
                  <div class="lates">
                    <div class="text-center">
                      <h2>Daftar Kejuaraan</h2>
                    </div>
                  </div>
                @if(session('status'))
                  <div style="background-color:green; color:white;font-weight: bold">
                    {{session('status')}}
                  </div>
                @endif
                @foreach ($errors->all() as $error)
                  <h4 style="color: red">{{ $error }}</h4>
                @endforeach
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div style="overflow-x:auto;">
                  <table id="kejuaraan">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Berakhir</th>
                      <th>Lokasi</th>
                      <th>Keterangan</th>
                      <th>Formulir</th>
                      <th>Foto</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($kejuaraans as $key => $kejuaraan)
                    <?php 
                      $temp = explode(' ',$kejuaraan->created_at);
                    ?>
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $kejuaraan->nama }}</td>
                      <td>{{ $kejuaraan->tgl_awal }}</td>
                      <td>{{ $kejuaraan->tgl_akhir }}</td>
                      <td>{{ $kejuaraan->lokasi }}</td>
                      <td>{{ $kejuaraan->keterangan }}</td>
                      <td><a href="{{ url('formulir/'.$kejuaraan->formulir) }}" target="_blank">{{ $kejuaraan->formulir }}</td>
                      <td ><p><a href="{{'egaleri'.$kejuaraan->link}}"><img src="{{ url('foto/galeri/'.$kejuaraan->foto) }}" style="width: 150px; height: 100px;"
                      alt="galeri-img"></a></p>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>  
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
</section>

</div>
@section('script')
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- fullCalendar -->
<script src="{{ asset('bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>

<!-- SCRIPT BUAT NOTIF HAPUS -->
<script type="text/javascript">
    $('#hapus').click(function(){
        return confirm("Anda yakin untuk menghapus data ini?");
    });
</script>

<!-- SCRIPT BUAT KALENDER -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
      @foreach($kejuaraans as $key => $kejuaraan)
        {
          title          : '{{ $kejuaraan->nama }}',
          start          : new Date('{{ $kejuaraan->tgl_awal }}'),
          end            : new Date('{{ $kejuaraan->tgl_akhir }}'),
          allDay         : false,
          backgroundColor: '#0073b7', //yellow
          borderColor    : '#0073b7' //yellow
        },
      @endforeach
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>


<!-- SCRIPT BUAT DATATABLE -->
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      "scrollX"     : true
    })
    
  })
</script>
@endsection
@endsection