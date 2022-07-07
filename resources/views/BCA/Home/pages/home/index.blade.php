@extends('BCA.Home.index')
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('assets/css/home/carousel.css') }}">
@endsection
@section('contents')
    <section>
        @include('BCA.Home.pages.home.partials._carousel')
        <div class="container">
            <hr>
        </div>
        @include('BCA.Home.pages.home.partials._featuredVideo')
        <div class="container">
            <hr>
        </div>
        @include('BCA.Home.pages.home.partials._announcement')
        <div class="container">
            <hr>
        </div>
        @include('BCA.Home.pages.home.partials._photoGallery')
    </section>
@endsection
