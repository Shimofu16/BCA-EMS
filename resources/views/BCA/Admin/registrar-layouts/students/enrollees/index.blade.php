@extends('BCA.Admin.registrar-layouts.index')
@section('page-title')
    Enrollees
@endsection
@section('contents')
    @livewire('registrar.student.enrollee.index', [
        'students' => $students,
        'gradeLevels' => $gradeLevels,
    ])
@endsection
