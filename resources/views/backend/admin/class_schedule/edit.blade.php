@extends('backend.layout.master')


@section('page_title', 'Edit class schedule')
@section('dashboard_link', route('backend.admin.dashboard'))

@push('css')

@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('backend.admin.class-schedule.update', $class_schedule['id']) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="course">Course</label>
                                        <select name="course" id="course" class="form-control">
                                            <option value="" selected disabled>Select course</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course['id']}}" 
                                                    {{$course['id'] == $class_schedule['course_id']? 'selected':''}}>
                                                    {{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <select name="day" id="day" class="form-control">
                                            <option value="" selected disabled>Select day</option>
                                            <option value="Sunday" 
                                                {{$class_schedule['day'] == 'Sunday'? 'selected':''}}>
                                                Sunday</option>
                                            <option value="Monday"
                                                {{$class_schedule['day'] == 'Monday'? 'selected':''}}>
                                                Monday</option>
                                            <option value="Tuesday"
                                                {{$class_schedule['day'] == 'Tuesday'? 'selected':''}}>
                                                Tuesday</option>
                                            <option value="Wednesday"
                                                {{$class_schedule['day'] == 'Wednesday'? 'selected':''}}>
                                                Wednesday</option>
                                            <option value="Thursday"
                                                {{$class_schedule['day'] == 'Thursday'? 'selected':''}}>
                                                Thursday</option>
                                            <option value="Friday"
                                                {{$class_schedule['day'] == 'Friday'? 'selected':''}}>
                                                Friday</option>
                                            <option value="Saturday"
                                                {{$class_schedule['day'] == 'Saturday'? 'selected':''}}>
                                                Saturday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="start_time">Start time</label>
                                        <input type="time" name="start_time" id="start_time" 
                                            class="form-control" value="{{$class_schedule['start_time']}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="end_time">End time</label>
                                        <input type="time" name="end_time" id="end_time"
                                            class="form-control" value="{{$class_schedule['end_time']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <!-- bs-custom-file-input -->
    <script
        src="{{ asset('public/assets/backend') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js">
    </script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });

    </script>
@endpush
