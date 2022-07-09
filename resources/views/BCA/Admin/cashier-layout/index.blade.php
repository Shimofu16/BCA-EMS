@extends('BCA.Admin.cashier-layout.layouts.index')
@section('role')
    Cashier
@endsection
@section('sidebar')
    <ul class="navbar-nav bg-bca sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center flex-column"
            href="{{ route('cashier.dashboard.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                {{-- <img src="{{ asset('img/BCA-Logo.png') }}" class="img-fluid" alt=""> --}}
            </div>
            <div class="sidebar-brand-text mx-3">Cashier dashboard</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="{{ Request::routeIs('cashier.dashboard.index') ? 'active' : '' }} nav-item ">
            <a class="nav-link" href="{{ route('cashier.dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Payments Collapse Menu -->
        <li class="nav-item {{ Request::routeIs('cashier.payment.*.index') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fa-solid fa-money-check"></i>
                <span>Paments</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item mb-1 {{ Request::routeIs('cashier.payment.pending.index') ? 'active-collapse-item' : '' }}"
                        href="{{ route('cashier.payment.pending.index') }}">Pending</a>
                    <a class="collapse-item mb-1 {{ Request::routeIs('cashier.payment.confirmed.index') ? 'active-collapse-item' : '' }}"
                        href="{{ route('cashier.payment.confirmed.index') }}">Confirmed</a>
                    {{-- <a class="collapse-item mb-1 {{ Request::routeIs('cashier.payment.confirmed.index') ? 'active-collapse-item' : '' }}"
                        href="{{ route('cashier.payment.create.index') }}">Payment form</a> --}}
                </div>
            </div>
        </li>

        <!-- Nav Item - Teachers Collapse Me -->
        <hr class="sidebar-divider mb-0">
        <li class="nav-item">
            <a class="nav-link pe-auto" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
@endsection
