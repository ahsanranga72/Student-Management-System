@extends('backend.layout.master')


@section('page_title', 'Class Schedule')
@section('dashboard_link', route('backend.student.dashboard'))

@push('css')

@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Day</th>
                                    <th>Start time</th>
                                    <th>End time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($class_schedules as $k=>$class_schedule)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $class_schedule->day }}</td>
                                        <td>{{ $class_schedule->start_time }}</td>
                                        <td>{{ $class_schedule->end_time }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-centre">
                                            No data found!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-tools" style="float: right;">
                    {{ $class_schedules->links() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
