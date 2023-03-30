@extends('backend.layout.master')


@section('page_title', 'Student attendance')
@section('dashboard_link', route('backend.admin.dashboard'))

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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Clock in</th>
                                    <th>Clock out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attendances as $k=>$attendance)
                                <tr>
                                    <td>{{($attendances->currentPage()-1)*$attendances->perPage()+$k+1}}</td>
                                    <td>{{$attendance->student->name}}</td>
                                    <td>{{$attendance->date}}</td>
                                    <td>{{$attendance->status}}</td>
                                    <td>{{$attendance->clock_in}}</td>
                                    <td>{{$attendance->clock_out}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-centre">No data found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-tools" style="float: right;">
                    {{ $attendances->links() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
