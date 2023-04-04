@extends('backend.layout.master')


@section('page_title', 'Mark Attendance')
@section('dashboard_link', route('backend.admin.dashboard'))

@push('css')
<link rel="stylesheet" href="{{asset('public/assets/backend')}}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/assets/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('backend.admin.students.mark-attendance') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <select name="student" id="student" class="form-control select2">
                                            <option value="" selected disabled>Select student</option>
                                            @foreach($students as $id=>$name)
                                                <option value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float: right;">Mark as Present</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script src="{{asset('public/assets/backend')}}/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        $('.select2').select2({
      theme: 'bootstrap4'
    })
    })
</script>
@endpush
