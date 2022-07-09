@extends('BCA.Admin.registrar-layouts.index')
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
                <a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Teacher</span>
                </a>
                @include('BCA.Admin.registrar-layouts.teacher.modal._modal-add')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="teachers-table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-center">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col" class="text-center">Action</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h6 class="fw-bold">{{ $teacher->id }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column px-2 py-1">
                                        <h5 class="mb-0 text-sm">{{ $teacher->name }}
                                        </h5>
                                        <p class="text-sm text-secondary mb-0">
                                            {{ $teacher->email }}
                                        </p>
                                    </div>
                                </td>
                                <td>{{ $teacher->gender }}</td>
                                <td>{{ $teacher->age }}</td>
                                <td>{{ $teacher->contact }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#edit{{ $teacher->id }}">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('BCA.Admin.registrar-layouts.teacher.modal._modal-edit')
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
