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
    <li class="breadcrumb-item" aria-current="page">Junior Highschool</li>
@endsection
@section('contents')
    <section>
        <div class="container-sm">
            @include('BCA.Home.pages.partials._pageTitle')
            <div class="row">
                <div class="my-2">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs.jpg') }}" alt="" class="main-img">
                </div>
                <h2><span class="text-bca">J</span>unior Highschool</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis quod voluptates debitis ad
                    nostrum tenetur. Iste iusto, id maiores eligendi vel deserunt officia rem temporibus blanditiis
                    ipsa libero doloremque voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam unde soluta perferendis pariatur ducimus dignissimos possimus temporibus esse tenetur
                    animi consequuntur odit delectus iste dolores quos, dolorem aut earum amet?</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('enroll.index') }}" class="btn btn-bca"><i class="fa-solid fa-book"></i>&#160;&#160;Enroll now</a>
                </div>
            </div>
            <h3 class="mt-4">More Photos</h3>
            <div class="row gy-2 gx-2">
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 16.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 9.jpg') }}" alt=""
                        class="academics-card-img shadow rounded  ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 6.jpg') }}" alt=""
                        class="academics-card-img shadow rounded  ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 12.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 13.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Junior high School/jhs 14.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
            </div>
        </div>
    </section>
@endsection
