{{-- @extends('layouts.clienteApp')

@section('content')
@endsection --}}
@extends('layouts.clienteApp')

@section('content')

<!-- Page -->
    <div class="page">
      <div class="page-main">
        <div class="calendar-container">
          <div id="calendarNew"></div>
          <div class="modal fade" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" id="citaNewForm" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Nueva Cita</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ename">Observacion:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="ename" name="ename">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="starts">Comienso:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startDatetimePicker" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" id="starts" data-target="#startDatetimePicker"/>
                          <span data-target="#startDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                            <i class="icon wb-calendar" aria-hidden="true"></i>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="ends">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="ends" data-target="#endDatetimePicker"/>
                        <span data-target="#endDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                  <button class="btn btn-primary" type="submit" id="btnCitaForm" onclick="guardarCita()" data-dismiss="modal" type="button">Nueva Cita</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
            role="dialog" tabindex="-1" data-show="false">
            <div class="modal-dialog modal-simple">
              <form class="modal-content form-horizontal" action="#" method="post" role="form">
                <div class="modal-header">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                  <h4 class="modal-title">Modificar Cita</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEname">Observacion:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" id="editEname" name="editEname">
                      <input type="hidden" class="form-control" id="editId" name="editId">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editStarts">Comienso:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="startEditDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="editStarts" data-target="#startEditDatetimePicker"/>
                        <span data-target="#startEditDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="editEnds">Fin:</label>
                    <div class="col-md-10">
                      <div class="input-group" id="endEditDatetimePicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="editEnds" data-target="#endEditDatetimePicker"/>
                        <span data-target="#endEditDatetimePicker" data-toggle="datetimepicker" class="input-group-addon">
                          <i class="icon wb-calendar" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-actions">
                    <button class="btn btn-primary" data-dismiss="modal" onclick="editCita()" type="button">Guardar</button>
                    <button class="btn btn-danger" data-dismiss="modal"  onclick="deleteCita()" type="button">Eliminar</button>
                    <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-action" data-plugin="actionBtn">
      <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
        <i class="front-icon wb-plus animation-scale-up" aria-hidden="true"></i>
        <i class="back-icon wb-trash animation-scale-up" aria-hidden="true"></i>
      </button>
    </div>

@endsection 
@section('scripts')
<script>
// page is now ready, initialize the calendar...
var id=$('#userId').val();
console.log(moment().format('YYYY-MM-DD'));
lisDateFullcalendar();
  var my_options = {
      events:[],
      selectable: true,
      selectConstraint: {
          start: moment().format('YYYY-MM-DD'),
          end: '2100-01-01',
      },
      businessHours: {
        // days of week. an array of zero-based day of week integers (0=Sunday)
        dow: [ 1, 2, 3, 4, 5, 6, 7], // Monday - Thursday
        start: '9:00',
        end: '22:00', // an end time (6pm in this example)
      },
      defaultView: 'agendaWeek',
      lang: 'es',
      header: {
        left: null,
        center: 'prev,title,next',
        right: 'month,agendaWeek,agendaDay'
      },
      eventClick: function(event) {
        var color = event.backgroundColor ? event.backgroundColor : 'blue';
        if(event.estado=='Anulado'||event.estado=='Realizado'){
          return false;
        }
        $('#editEname').val(event.title);
        $('#editId').val(event.id);
        if (event.start) {
          $('#editStarts').val(moment(event.start._i).format("MM/DD/YYYY HH:mm"));
        } else {
          $('#editStarts').val('');
        }
        if (event.end) {
          $('#editEnds').val(moment(event.end._i).format("MM/DD/YYYY HH:mm"));
        } else {
          $('#editEnds').val('');
        }
        $('#editNewEvent').modal('show').one('hidden.bs.modal', function(e) {
          event.title = $('#editEname').val();
          $('#calendar').fullCalendar('updateEvent', event);
        })
      },
      unselect: function( jsEvent, view ){   
      },
      select: function( start, end, jsEvent, view ){
        var startDate=moment(start).format("MM/DD/YYYY HH:mm");
        var endDate=moment(end).format("MM/DD/YYYY HH:mm");
        var stDate=new Date(startDate);
        var eDate=new Date(endDate);

        var newStartDate = moment((stDate.getUTCMonth()+1)+"/"+stDate.getDate()+"/"+stDate.getUTCFullYear()+" "+view.calendar.businessHourGenerator.rawComplexDef.start, "MM/DD/YYYY HH:mm").valueOf();
        var newEndDate = moment((stDate.getUTCMonth()+1)+"/"+stDate.getDate()+"/"+stDate.getUTCFullYear()+" "+view.calendar.businessHourGenerator.rawComplexDef.end, "MM/DD/YYYY HH:mm").valueOf();
        var s = moment(newStartDate).format("MM/DD/YYYY HH:mm");
        var e = moment(newEndDate).format("MM/DD/YYYY HH:mm");

        var startCorrect=new Date(s);
        var endCorrect=new Date(e);
        var realDate=new Date();          
        var dowCorrect=view.calendar.businessHourGenerator.rawComplexDef.dow;
       
        if(!(Date.parse(stDate)>=Date.parse(realDate))){
          return false
        }
        if(view.name!=="month"){
          if(!(Date.parse(stDate)>=Date.parse(startCorrect)&&Date.parse(stDate)<=Date.parse(endCorrect))){
            return false;
          }
          if(!(Date.parse(eDate)>=Date.parse(startCorrect)&&Date.parse(eDate)<=Date.parse(endCorrect))){
            return false;
          }
        }
        if (start) {
          $('#starts').val(startDate);
        } else {
          $('#starts').val('');
        }
        if (end) {
          $('#ends').val(endDate);
        } else {
          $('#ends').val('');
        }
        $('#addNewEvent').modal('show');
      },
      editable: false,
    }
$('#calendarNew').fullCalendar(my_options)
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
function guardarCita(){
  var starts=$('#starts').val();
  var ends=$('#ends').val();
  var title=$('#ename').val();
  
  var data={'title':title,'starts':starts,'ends':ends,'id':id}
  $.ajax({
      url:'/client/cita',
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
        toastr.success('Cita realizado con exito','Guardado')
        console.log(resp);
          $('#calendarNew').fullCalendar('renderEvent', {
              id: resp.id,
              title: resp.titulo,
              esstado: resp.estado,
              start: moment(resp.fechaInicio).format("MM/DD/YYYY HH:mm"),
              end: moment(resp.fechaFin).format("MM/DD/YYYY HH:mm"),
              backgroundColor: resp.color,
              borderColor:resp.color
        });
      },
      error: function( req, status, err ) {
        toastr.error('Cita no realizado','No Guardado')
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