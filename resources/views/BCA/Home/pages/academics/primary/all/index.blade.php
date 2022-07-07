@extends('homepage.index')
@section('title')
    <span class="text-bca">A</span>cademics
@endsection
@section('page-title')
<li class="breadcrumb-item active"><a href="{{ route('academics.index') }}">Academics</a></li>
@endsection
@section('subtitle')
    <li class="breadcrumb-item active"><a href="{{ route('primary.index') }}">Primary</a></li>
@endsection
@section('subtitlesub')
    @if (Request::is('academics/primary/nursery'))
        <li class="breadcrumb-item" aria-current="page">Nursery</li>
    @endif
    @if (Request::is('academics/primary/kindergarten'))
        <li class="breadcrumb-item" aria-current="page">Kindergarten</li>
    @endif
    @if (Request::is('academics/primary/preparatory'))
        <li class="breadcrumb-item" aria-current="page">Preparatory</li>
    @endif
@endsection
@section('contents')
    <section>
        <div class="container-sm">
            @include('BCA.Home.pages.partials._pageTitle')
            <div class="row">
                <div class="my-2">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 2.jpg') }}" alt="" class="main-img">
                </div>
                @if (Request::is('academics/primary/nursery'))
                    <h2><span class="text-bca">N</span>ursery</h2>
                @endif
                @if (Request::is('academics/primary/kindergarten'))
                    <h2><span class="text-bca">K</span>indergarten</h2>
                @endif
                @if (Request::is('academics/primary/preparatory'))
                    <h2><span class="text-bca">P</span>reparatory</h2>
                @endif
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis quod voluptates debitis ad
                    nostrum tenetur. Iste iusto, id maiores eligendi vel deserunt officia rem temporibus blanditiis
                    ipsa libero doloremque voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam unde soluta perferendis pariatur ducimus dignissimos possimus temporibus esse tenetur
                    animi consequuntur odit delectus iste dolores quos, dolorem aut earum amet?</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('enroll.index') }}" class="btn btn-bca"><i
                            class="fa-solid fa-book"></i>&#160;&#160;Enroll now</a>
                </div>
            </div>
            <h3 class="mt-4">More Photos</h3>
            <div class="row gy-2 gx-2">
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 5.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 6.jpg') }}" alt=""
                        class="academics-card-img shadow rounded  ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 8.jpg') }}" alt=""
                        class="academics-card-img shadow rounded  ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 7.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 4.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
                <div class="col-lg-4 col-md-6 ">
                    <img src="{{ asset('assets/img/students/Pre-School/nursery 3.jpg') }}" alt=""
                        class="academics-card-img shadow rounded ">
                </div>
            </div>
        </div>
    </section>
@endsection
