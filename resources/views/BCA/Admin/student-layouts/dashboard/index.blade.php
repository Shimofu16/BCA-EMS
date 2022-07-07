@extends('admin.student-layouts.index')

@section('contents')
<h1 class="h3 mb-4 text-gray-800">{{ Auth::user()->roles }} Dashboard</h1>
<div class="row">
<div class="col-md-8">

</div>
<div class="col-md-4">
    <img src="{{ asset('img/teacher.png') }}" alt="" class="">
</div>
<hr>
</div>
@endsection
