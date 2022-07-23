@extends('BCA.Home.pages.home.index')

@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/carousel.css') }}">
@endsection
@section('title')
<span class="text-bca">A</span>cademics
@endsection
@section('page-title')
    <li class="breadcrumb-item active"><a href="{{ route('academics.index') }}">Academics</a></li>
@endsection
@section('subtitle')
    <li class="breadcrumb-item" aria-current="page">Elementary</li>
@endsection
@section('contents')
<section>
    <div class="container-sm">
        @include('BCA.Home.pages.partials._pageTitle')
        <div class="row">
            <div class="my-2">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 2.jpg') }}" alt="" class="main-img">
            </div>
            <h2><span class="text-bca">E</span>lementary</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis quod voluptates debitis ad
                nostrum tenetur. Iste iusto, id maiores eligendi vel deserunt officia rem temporibus blanditiis
                ipsa libero doloremque voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quisquam unde soluta perferendis pariatur ducimus dignissimos possimus temporibus esse tenetur
                animi consequuntur odit delectus iste dolores quos, dolorem aut earum amet?</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('enroll.index') }}" class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom"><i class="fa-solid fa-book"></i>&#160;&#160;Enroll now</a>
            </div>
        </div>
        <div class="container">
            <hr>
        </div>
        <h3 class="mt-4">More Photos</h3>
        <div class="row gy-2 gx-2">
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 1.jpg') }}" alt=""
                    class="academics-card-img shadow rounded ">
            </div>
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 2.jpg') }}" alt=""
                    class="academics-card-img shadow rounded  ">
            </div>
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 3.jpg') }}" alt=""
                    class="academics-card-img shadow rounded  ">
            </div>
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 4.jpg') }}" alt=""
                    class="academics-card-img shadow rounded ">
            </div>
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 10.jpg') }}" alt=""
                    class="academics-card-img shadow rounded ">
            </div>
            <div class="col-lg-4 col-md-6 ">
                <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 8.jpg') }}" alt=""
                    class="academics-card-img shadow rounded ">
            </div>
        </div>
    </div>
</section></div>
@endsection
