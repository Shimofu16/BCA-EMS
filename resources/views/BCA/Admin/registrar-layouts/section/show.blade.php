@extends('BCA.Admin.registrar-layouts.index')
@section('page-title')
    Sections
@endsection
@section('contents')
    <div class="row shadow align-items-center justify-content-between mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-3 mb-0">{{ $section->section_name }}</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end align-items-">
                <a href="{{ url()->previous()  }}"
                    class="btn btn-outline-primary mr-2">
                    <span class="d-flex align-items-center"><i class="fas fa-chevron-circle-left"></i>&#160;Back</span>
                </a>
                {{-- <a href="{{ route('registrar.section.student.list', $section->id) }}" class="btn btn-primary"
                    target="__blank">
                    <span class="d-flex align-items-center"><i class="fa-solid fa-download"></i>&#160; Download Student
                        List</span> --}}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="section-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student LRN</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Middle Name</th>
                            <th class="text-center">Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($section->students as $student)
                            <tr>
                                <td class="text-center"> {{ $student->student_lrn }}</td>
                                <td class="text-center"> {{ $student->first_name }}</td>
                                <td class="text-center"> {{ $student->middle_name }}</td>
                                <td class="text-center"> {{ $student->last_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    {{-- bakit wala to pota --}}
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#section-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
