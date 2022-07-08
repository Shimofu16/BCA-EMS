@extends('BCA.Admin.registrar-layouts.index')
@section('page-title')
    Enrolled student
@endsection

@section('contents')
    @livewire('registrar.student.enrolled.index', [
        'students' => $students,
        'gradeLevels' => $gradeLevels,
        'sections' => $sections,
    ])
@endsection
@section('dashboard-javascript')

@endsection
