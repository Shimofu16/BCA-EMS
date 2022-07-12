@extends('BCA.Admin.student-layouts.index')

@section('dashboard-css')
    @livewireStyles()
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-body pb-0">
            @livewire('student.enrollment.form', ['student' => $student, 'father' => $father, 'mother' => $mother, 'guardian' => $guardian, 'isEnrollment' => $isEnrollment])
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    @livewireScripts()
    @stack('scripts')
@endsection
