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
                            <th class="text-center">Grade Level</th>
                            <th class="text-center">Number of Subjects</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gradeLevels as $gradeLevel)
                            <tr class="text-center">
                                <td>{{ $gradeLevel->grade_name }}</td>
                                <td>{{ $gradeLevel->subjects->count() }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-sm btn-outline-info mr-1"
                                        href="{{ route('registrar.subject.index', $gradeLevel->id) }}">View</a>
                                </td>
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
