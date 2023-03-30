@extends('backend.layout.master')

@section('page_title', 'Dashboard')
@section('dashboard_link', route('backend.admin.dashboard'))

@push('css')
    <!-- fullCalendar -->
    <link rel="stylesheet"
        href="{{ asset('public/assets/backend') }}/plugins/fullcalendar/main.css">
    <style>
        button.in-out{
            margin: 40px 0;
            padding: 10px 30px;
        }
    </style>
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_present??0}}</h3>

                        <p>Total present</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="#" class="small-box-footer"></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-7">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mark Attendance</h3>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <center>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('backend.student.attendance.clock-in') }}" method="post">
                                @csrf
                                @if(empty($attendance) || $attendance->clock_out != '00:00:00')
                                    <button type="submit" value="0" name="in" id="clock_in" class="btn btn-primary in-out">{{__('CLOCK IN')}}</button>
                                @else
                                    <button type="submit" value="0" name="in" id="clock_in" class="btn btn-success in-out" disabled>{{__('Already IN')}}</button>
                                @endif
                            </form>
                        </div>
                        <div class="col-md-6">
                            @if(!empty($attendance) && $attendance->clock_out == '00:00:00')
                            <form action="{{ route('backend.student.attendance.clock-out') }}" method="post">
                                @csrf
                                    <button type="submit"  value="1" name="out" id="clock_out" class="btn btn-danger in-out">{{__('CLOCK OUT')}}</button>
                            </form>
                            @else
                                <button type="submit" value="1" name="out" id="clock_out" class="btn btn-danger in-out" disabled>{{__('CLOCK OUT')}}</button>
                            @endif
                        </div>
                    </div>
                </center>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('js')
    <script src="{{ asset('public/assets/backend') }}/plugins/fullcalendar/main.js"></script>
    <script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
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

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;

    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev today',
        center: 'title',
        right : 'next'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        @forelse($holidays as $holiday)
        {
          title          : '{{$holiday->title}}',
          start          : new Date("{{$holiday->date}}"),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        @empty
        {
          title          : 'All Day Event',
          start          : new Date("1995-1-1"),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        }
        @endforelse
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
@endpush
