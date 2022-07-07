@extends('homepage.pages.portal.index')
@section('title')
Breakthrough Christian Academy
@endsection
@section('message')
<h1 class="h6 text-gray-900 mb-4"><i class="fa-solid fa-arrow-down"></i> Please click or tap your destination.</h1>

@endsection
@section('forms')

<hr>
<a href="{{ route('admin.portal') }}" class="btn btn-primary btn-user btn-block mt-2 h4">
    Admin
</a>
<a href="{{ route('registrar.portal') }}" class="btn btn-primary btn-user btn-block mt-2 h4">
    Registrar
</a>
@endsection
@section('back')
<div class="text-center">
    <a class="small" href="{{ route('portal.index') }}">Do you want to go back?</a>
</div>
@endsection

