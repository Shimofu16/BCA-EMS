@extends('admin.registrar-layouts.index')
@section('page-title')
    Enrollees
@endsection
@section('contents')
@livewire('registrar-dashboard.enrolled.index', ['students' => $students])

    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                {{-- <a href="{{ route('registrar.enrollees.list') }}" class="btn btn-primary mr-5">
                    <span class="d-flex align-items-center"><i class="fa-solid fa-download"></i>&#160; Download Student List</span>
                </a> --}}
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="enrollee-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student LRN</th>
                            <th class="text-center">Student ID</th>
                            <th class="text-center">First name</th>
                            <th class="text-center">Middle name</th>
                            <th class="text-center">Last name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-center">{{ $student->student_lrn }}</td>
                                <td class="text-center">{{ $student->student_id }}</td>
                                <td class="text-center">{{ $student->first_name }}</td>
                                <td class="text-center">{{ $student->middle_name }}</td>
                                <td class="text-center">{{ $student->last_name }}</td>
                                <td class="text-center">{{ $student->gender }}</td>
                                <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                <td class="text-center">{{ $student->student_type }}</td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-sm btn-success mr-1" href="#" data-toggle="modal"
                                        data-target="#accept{{ $student->id }}">Accept</a>
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('registrar.enrollees.show', $student->id) }}">More Details</a>
                                </td>
                            </tr>
                            @include('admin.registrar-layouts.students.enrollees.modal._create')
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
            $('#enrollee-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
