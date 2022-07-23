@extends('BCA.Admin.admin-layouts.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="" class="card-body link-primary text-decoration-none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Events</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $eventsCount }}</div>
                        </div>
                        <div class="col-auto ">
                            <i class="fa-solid fa-calendar-days fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
