@extends('BCA.Admin.student-layouts.index')

@section('dashboard-css')
    @livewireStyles()
@endsection
@section('contents')
<div class="card mb-3">
  <div class="card-body pb-0">
    @livewire('student.enrollment.form',['student'=>$student,'father'=> $father,'mother'=> $mother,'guardian'=> $guardian])
  </div>
</div>
@endsection
@section('dashboard-javascript')
    @livewireScripts()
@endsection
