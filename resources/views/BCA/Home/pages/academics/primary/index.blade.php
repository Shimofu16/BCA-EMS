@extends('BCA.Home.pages.home.index')

@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('css/home/carousel.css') }}">
@endsection
@section('title')
    <span class="text-bca">P</span>rimary
@endsection
@section('page-title')
    <li class="breadcrumb-item active"><a href="{{ route('academics.index') }}">Academics</a></li>
@endsection
@section('subtitle')
    <li class="breadcrumb-item" aria-current="page">Primary</li>
@endsection
@section('contents')
<section>
    <div class="container-sm">
        @include('BCA.Home.pages.partials._pageTitle')
        <div class="row flex-xxl-nowrap">
            <div class="col-md-4 col-lg-4 col-xxl-4">
                <div class="card custom-shadow">
                    <div class="card-header p-2">
                        <img src="{{ asset('assets/img/students/Pre-School/nursery.jpg') }}" alt="nursery"
                            class="academics-card-img">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><span class="text-bca">N</span>ursery</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                            ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                            reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                        <div>
                            <a href="{{ route('nursery.index') }}" class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom"> <i class="fa-solid fa-angle-right"></i>
                                <span class="text-uppercase">
                                    See more
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xxl-4">
                <div class="card custom-shadow">
                    <div class="card-header p-2">
                        <img src="{{ asset('assets/img/students/Pre-School/nursery 5.jpg') }}" alt="elementary"
                            class="academics-card-img">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><span class="text-bca">K</span>indergarten</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                            ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                            reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                        <div>
                            <a href="{{ route('kindergarten.index') }}" class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom"> <i class="fa-solid fa-angle-right"></i>
                                <span class="text-uppercase">
                                    See more
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xxl-4">
                <div class="card custom-shadow">
                    <div class="card-header p-2">
                        <img src="{{ asset('assets/img/students/Pre-School/nursery 8.jpg') }}" alt="nursery"
                            class="academics-card-img">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><span class="text-bca">P</span>reparatory</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                            ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                            reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                        <div>
                            <a href="{{ route('preparatory.index') }}" class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom"> <i class="fa-solid fa-angle-right"></i>
                                <span class="text-uppercase">
                                    See more
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
