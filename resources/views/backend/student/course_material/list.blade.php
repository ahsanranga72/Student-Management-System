@extends('backend.layout.master')


@section('page_title', 'Course material')
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($course_materials as $k=>$course_material)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $course_material->name }}</td>
                                        <td>
                                            <div class="g-2">
                                                <a type="button" target="_blank"
                                                    href="{{ route('backend.student.course-material.show', $course_material->id) }}"
                                                    class="btn btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                                                <a type="button"
                                                    href="{{ route('backend.student.course-material.download', $course_material->id) }}"
                                                    class="btn btn-sm btn-success" title="Download"><i class="fas fa-download"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-centre">
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
                    {{ $course_materials->links() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
