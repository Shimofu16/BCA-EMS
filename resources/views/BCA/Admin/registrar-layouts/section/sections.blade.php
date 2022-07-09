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
                <a class="btn btn-outline-primary " data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Section</span>
                </a>
                @include('BCA.Admin.registrar-layouts.section.modal._modal-section')
                {{-- For future purposes
                    can add and update grade level --}}
                {{-- <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn rounded btn-primary" data-toggle="dropdown"
                        aria-expanded="false">
                       Options&#160;&#160;<i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu border border-dark" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#add">Add Section</a>
                        <a class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#addGrade">Add Grade Level</a>
                    </div>
                </div> --}}
                {{-- @include('admin.registrar-layouts.section.modal._modal-section')
                @include('admin.registrar-layouts.section.modal._modal-grade') --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="section-table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Grade Level</th>
                            <th scope="col">Number of Sections</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gradeLevels as $gradeLevel)
                            <tr>
                                <td>
                                    <div class="px-2">
                                        {{ $gradeLevel->grade_name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="px-2">
                                        {{ $gradeLevel->sections->count() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a class="btn btn-sm btn-outline-info mr-1"
                                            href="{{ route('registrar.section.index', $gradeLevel->id) }}">View</a>

                                    </div>
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
            $('#section-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
