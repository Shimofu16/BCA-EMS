@extends('admin.registrar-layouts.index')
@section('page-title')
    Sections
@endsection
@section('contents')
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-3 mb-0">{{ $title->grade_name }} </h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="{{ route('registrar.section.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span>Back</span>
                </a>
               {{--  <button class="btn btn-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Section</span>
                </button>
                @include(
                    'admin.registrar-layouts.section.modal._modal-section'
                ) --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="section-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Section name</th>
                            <th class="text-center">Number of students</th>
                            <th class="text-center">Adviser</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td class="text-center">{{ $section->section_name }}</td>
                                @if ($section->students->count() == null)
                                    <td class="text-center">No Student</td>
                                @else
                                    <td class="text-center">{{ $section->students->count() }}</td>
                                @endif
                                @if ($section->teacher_id == null)
                                    <td class="text-center">No Adviser</td>
                                @else
                                    <td class="text-center">{{ $section->teacher->name }}</td>
                                @endif
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-sm btn-info mr-1"
                                        href="{{ route('registrar.section.show', $section->id) }}">View</a>
                                    <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#edit{{ $section->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#delete{{ $section->id }}">Delete</button>
                                    @include(
                                        'admin.registrar-layouts.section.modal._modal-edit'
                                    )
                                    @include(
                                        'admin.registrar-layouts.section.modal._modal-delete'
                                    )
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
