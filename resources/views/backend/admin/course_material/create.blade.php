@extends('backend.layout.master')


@section('page_title', 'Add new course material')
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
                        <h3 class="card-title">Course Material Upload Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('backend.admin.course-material.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="course">Course <span style="color: red;">*</span></label>
                                        <select name="course" id="course" class="form-control">
                                            <option value="" selected disabled>Select course</option>
                                            @foreach($courses as $course)
                                                <option value="{{$course['id']}}">{{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="file">File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file">
                                                <label class="custom-file-label" for="file">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
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
