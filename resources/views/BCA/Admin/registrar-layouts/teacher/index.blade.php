@extends('admin.registrar-layouts.index')
@section('page-title')
    Teachers
@endsection

@section('contents')
    <div class="row shadow align-items-center justify-content-between mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-3 mb-0">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Teacher</span>
                </a>
                @include('admin.registrar-layouts.teacher.modal._modal-add')
            </div>
        </div>
    </div>
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="teachers-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Phone No.</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</td>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teachers as $teacher)
                            <tr>
                                <td class="text-center">{{ $teacher->name }}</td>
                                <td class="text-center">{{ $teacher->gender }}</td>
                                <td class="text-center">{{ $teacher->age }}</td>
                                <td class="text-center">{{ $teacher->contact }}</td>
                                <td class="text-center">{{ $teacher->email }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#edit{{ $teacher->id }}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @include('admin.registrar-layouts.teacher.modal._modal-edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#teachers-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
