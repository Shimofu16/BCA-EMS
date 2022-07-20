@extends('BCA.Admin.admin-layouts.layouts.index')
@section('role')
    Admin
@endsection
@section('sidebar')
    <ul class="navbar-nav bg-bca sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center flex-column"
            href="{{ route('registrar.dashboard.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                {{-- <img src="{{ asset('img/BCA-Logo.png') }}" class="img-fluid" alt=""> --}}
            </div>
            <div class="sidebar-brand-text mx-3">Admin dashboard</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="{{ Request::routeIs('admin.dashboard.index') ? 'active' : '' }} nav-item ">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Website Collapse Menu -->
        <li class="nav-item {{ Request::routeIs('admin.events.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fa-solid fa-bars-progress"></i>
                <span>Manage Website</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    <a class="collapse-item mb-1 {{ Request::is('admin/events') ? 'active-collapse-item' : '' }}"
                        href="{{ route('admin.events.index') }}">Events</a>
                   {{--  <a class="collapse-item mb-1 {{ Request::is('admin/students/enrollee') ? 'active-collapse-item' : '' }}"
                        href="#">Photo Gallery</a> --}}
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
