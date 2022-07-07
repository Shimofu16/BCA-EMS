@extends('admin.registrar-layouts.index')
@section('page-title')
    Grade Level
@endsection
@section('contents')
    <div class="row shadow align-items-center justify-content-between mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-3 mb-0">{{ $gradeLevel->grade_name }}</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end align-items-">
                <a href="{{ route('registrar.subject.index')  }}"
                    class="btn btn-primary mr-2">
                    <span class="d-flex align-items-center"><i class="fas fa-chevron-circle-left"></i>&#160; Back</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="subject-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="text-center"> {{ $subject->subject }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $subject->id }}">Edit</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $subject->id }}">Delete</a>
                                </td>
                                @include('admin.registrar-layouts.subjects.modal._modal-edit')
                                @include('admin.registrar-layouts.subjects.modal._modal-delete')
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
