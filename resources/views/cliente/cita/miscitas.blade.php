{{-- @extends('layouts.clienteApp')

@section('content')
@endsection --}}
@extends('layouts.clienteApp')

@section('content')

<!-- Page -->
<div class="page">
      <div class="page-header">
        <h1 class="page-title">Mis Citas </h1>
      </div>
      <div class="page-content container-fluid">
        <div id="app">
            <mis-citas/>
        </div>
      </div>
    </div>

@endsection 
@section('scripts')
<script src="/js/app.js"></script>
<script>
// page is now ready, initialize the calendar...
var id=$('#userId').val();
dateTime();
function dateTime(){
  $('#startDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
  $('#endDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
  $('#startEditDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
  $('#endEditDatetimePicker').datetimepicker({
    sideBySide: true,
    allowInputToggle: true,
    format:"MM/DD/YYYY HH:mm",
    minDate:moment().format('MM/DD/YYYY HH:mm')
  });
}
function lisDateFullcalendar(){
  var newEvents = new Array();
  $.ajax({
    url: '/client/citacliente/'+id,
    dataType: 'json',
    success: function( resp ) {
      
      for (i in resp) {
          var obj = new Object();
              obj.id=resp[i].id;
              obj.start=moment(resp[i].fechaInicio).format("YYYY-MM-DD HH:mm");
              obj.end=moment(resp[i].fechaFin).format("YYYY-MM-DD HH:mm");
              obj.title=resp[i].titulo;
              obj.estado=resp[i].estado;
              obj.backgroundColor=resp[i].color;
              obj.borderColor=resp[i].color;
            newEvents.push(obj);        
      }
      console.log(newEvents);
      EVENTS = newEvents;
      CAL = $('#calendarNew').fullCalendar('getCalendar');
      CAL.refresh = function() {
          CAL.removeEvents();
          CAL.addEventSource(EVENTS);
      }
      CAL.refresh();     
    },
    error: function( req, status, err ) {
      console.log( 'something went wrong', status, err );
      return [];
    }
  });
  return newEvents;
}
function editCita(){
  var starts=$('#editStarts').val();
  var ends=$('#editEnds').val();
  var title=$('#editEname').val();
  var idEdit=$('#editId').val();
  var idEdit=$('#editId').val();
  var data={'title':title,'starts':starts,'ends':ends,'id':idEdit}
  $.ajax({
      url:'/client/editarcita',
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      dataType:'json',
      cache: false,
      data:data,
      async: true,
      beforeSend: function(){
        $('#btnCitaForm').attr('Guardando...');
      },
      success: function( resp ) {
        toastr.success('Cita editado con exito','Editado')
        $('#calendarNew').fullCalendar('removeEvents', idEdit);
        console.log(resp);
          $('#calendarNew').fullCalendar('renderEvent', {
              id: resp.id,
              estado: resp.estado,
              title: resp.titulo,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              borderColor:resp.color
        });
      },
      error: function( req, status, err ) {
        toastr.error('Cita no editado','No editado')
      }
    })
    .done(function(respuesta){
    
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
    });
}
function deleteCita(){
  var idEdit=$('#editId').val();
  var data={'id':idEdit}
  $.ajax({
      url:'/client/desactivarcita',
      headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type:'POST',
      dataType:'json',
      cache: false,
      data:data,
      async: true,
      beforeSend: function(){
        $('#btnCitaForm').attr('Guardando...');
      },
      success: function( resp ) {
        toastr.success('Cita eliminado con exito','Eliminado')
        console.log(resp);
        $('#calendarNew').fullCalendar('removeEvents', idEdit);
          $('#calendarNew').fullCalendar('renderEvent', {
              title: resp.titulo,
              id: resp.id,
              estado: resp.estado,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              borderColor:resp.color
        });
      },
      error: function( req, status, err ) {
        toastr.error('Cita no eliminado','No eliminado')
      }
    })
    .done(function(respuesta){
    
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
    });
}
</script>
@endsection