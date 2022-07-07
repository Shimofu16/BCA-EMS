@extends('homepage.index')
@section('title')
<span class="text-bca">P</span>hoto <span class="text-bca">G</span>allery
@endsection
@section('page-title')
    <li class="breadcrumb-item" aria-current="page">Photo Gallery</li>
@endsection
@section('contents')
<section>
    <div class="container-sm">
        @include('homepage.pages.partials._pageTitle')
        <div class="row gy-2 gx-2">
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca camping/Bca Camping.jpg') }}" alt="Bca Camping" class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">BCA Camping</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca nutrition month/Bca Nutrition 2.jpg') }}" alt="Bca Nutrition Month"
                        class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">Bca Nutrition Month</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca graduation/Bca Graduation 2.jpg') }}" alt="Bca Graduation"
                        class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">Bca graduation</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca purity/Bca Purity 2.jpg') }}" alt="Bca Purity"
                        class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">Bca Purity</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca science month/Bca Science Month 3.jpg') }}" alt="Bca Science Month"
                        class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">Bca Science Month</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="box rounded-3">
                    <img src="{{ asset('./uploads/photo gallery/bca un/Bca UN.jpg') }}" alt="Bca UN"
                        class="img-fluid ">
                    <div class="box-content">
                        <h3 class="title">Bca UN</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
