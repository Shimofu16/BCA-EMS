@extends('homepage.index')
@section('title')
    <span class="text-bca">A</span>cademics
@endsection
@section('page-title')
    <li class="breadcrumb-item" aria-current="page">Academics</li>
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
                            <h4 class="card-title"><span class="text-bca">P</span>rimary</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                                ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                                reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                            <div>
                                <a href="{{ route('primary.index') }}" class="btn btn-bca"> <i class="fa-solid fa-angle-right"></i>
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
                            <img src="{{ asset('assets/img/students/Elementary/Higher Elementary/higher elem 3.jpg') }}" alt="elementary"
                                class="academics-card-img">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><span class="text-bca">E</span>lementary</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                                ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                                reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                            <div>
                                <a href="{{ route('elementary.index') }}" class="btn btn-bca"> <i class="fa-solid fa-angle-right"></i>
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
                            <img src="{{ asset('assets/img/students/Junior high School/jhs.jpg') }}" alt="nursery"
                                class="academics-card-img">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><span class="text-bca">J</span>unior <span class="text-bca">H</span>ighschool</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus,
                                ut quos non laudantium sed libero rerum eum? Impedit eos, quia ullam dicta quibusdam
                                reprehenderit, recusandae labore pariatur quo vitae odio!</p>
                            <div>
                                <a href="{{ route('juniorhighschool.index') }}" class="btn btn-bca"> <i class="fa-solid fa-angle-right"></i>
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
