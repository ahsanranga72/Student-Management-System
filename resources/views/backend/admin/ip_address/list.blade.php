@extends('backend.layout.master')


@section('page_title', 'IP address')
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
                                <a href="{{ route('backend.admin.ip-address.create') }}"
                                    class="btn btn-primary" style="margin: 0 10px; padding: 2px 20px;"><i
                                        class="fas fa-plus"></i> Add</a>
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
                                    <th>IP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ips as $k=>$ip)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $ip['name'] }}</td>
                                        <td>{{ $ip['ip'] }}</td>
                                        <td>
                                            <div class="g-2">
                                                <a type="button"
                                                    href="{{ route('backend.admin.ip-address.edit', $ip['id']) }}"
                                                    class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger" href="javascript:"
                                                    onclick="alert_function('delete-{{ $ip['id'] }}')"><i class="fas fa-trash"></i></a>
                                                <form
                                                    action="{{ route('backend.admin.ip-address.delete',  $ip['id']) }}"
                                                    id="delete-{{ $ip['id'] }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-centre">
                                            Please add first.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-tools" style="float: right;">
                    {{ $ips->links() }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')

@endpush
