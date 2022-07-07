@extends('admin.layouts.mainLayout')
@section('role')
    Teacher
@endsection
@section('sidebar')
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('teacher.dashboard.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ Auth::user()->roles }} dashboard</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="{{ Request::is('teacher') ? 'active' : '' }} nav-item ">
            <a class="nav-link" href="{{ route('teacher.dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboarda</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Grades</span>
            </a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}
        <hr class="sidebar-divider mb-0">
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-power-off"></i>
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
