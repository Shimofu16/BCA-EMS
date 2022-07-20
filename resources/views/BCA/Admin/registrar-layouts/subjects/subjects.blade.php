@extends('BCA.Admin.registrar-layouts.index')

@section('page-title')
    Grade levels
@endsection
@section('contents')
    <div class="row shadow align-items-center justify-content-between mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-3  mb-0">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Subject</span>
                </a>
                @include('BCA.Admin.registrar-layouts.subjects.modal._modal-subject')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="subject-table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Garade Level</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td> {{ $subject->subject }}</td>
                                <td> {{ $subject->gradeLevel->grade_name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#edit{{ $subject->id }}">Edit</a>
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#delete{{ $subject->id }}">Delete</a>
                                </td>
                                @include('BCA.Admin.registrar-layouts.subjects.modal._modal-edit')
                                @include('BCA.Admin.registrar-layouts.subjects.modal._modal-delete')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#subject-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
