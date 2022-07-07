@extends('BCA.Home.pages.portal.index')
@section('title')
Breakthrough Christian Academy
@endsection
@section('message')
<h1 class="h6 text-gray-900 mb-4"><i class="fa-solid fa-arrow-down"></i> Please click or tap your destination.</h1>

@endsection
@section('forms')
<hr>
<a href="{{ route('teacher.portal') }}" class="btn btn-primary btn-user btn-block mt-2 h4">
    Teacher
</a>
<a href="{{ route('student.portal') }}" class="btn btn-primary btn-user btn-block mt-2 h4">
    Student
</a>
@endsection
