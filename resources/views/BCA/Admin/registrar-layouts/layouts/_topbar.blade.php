<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    @if (!Request::routeIs('registrar.enrolled.show') && !Request::routeIs('registrar.enrollees.show'))
        <div class="row flex-nowrap">
            @php
                $sy = DB::table('school_years')->get();
                $current = DB::table('school_years')
                    ->where('isCurrentViewByRegistrar', '=', 1)
                    ->first();
            @endphp
            <div class="col px-0 mr-1">
                <button class="btn" data-toggle="modal" data-target="#enrollment">
                    {{ $current->isEnrollment == 1 ? 'Close' : 'Open' }} Enrollment
                </button>
            </div>
            <div class="col px-0">
                @csrf
                @method('post')
                <div class="dropdown">
                    <button class="btn btn-bca-outline dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-expanded="false">
                        SY {{ $current->school_year }}
                    </button>
                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                        @foreach ($sy as $item)
                            @if ($item->isCurrentViewByRegistrar != 1)
                                <form action="{{ route('registrar.change.sy', $item->id) }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">{{ $item->school_year }}</button>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal fade" id="enrollment" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLongTitle">Students information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">
                                {{ $current->isEnrollment == 1 ? 'Close' : 'Open' }} Enrollment for SY
                                {{ $current->school_year }}?
                            </h5>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-secondary" type="button"
                                data-dismiss="modal">Cancel</button>
                            <form action="{{ route('registrar.change.sy.enrollment') }}" method="get">
                                @csrf
                                <button class="btn btn-primary" type="submit">Yes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (Auth::guard('registrar')->user() !== null)
                    <span
                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('registrar')->user()->name }}</span>
                    @if (Auth::guard('registrar')->user()->gender == 'Male')
                        <img class="img-profile rounded-circle asd"
                            src="{{ asset('assets/img/illustrations/icons/undraw_profile_2.svg') }}">
                        @if (Auth::guard('registrar')->user()->active == 1)
                            <span class="badge badge-success badge-counter">o</span>
                        @else
                            <span class="badge badge-danger badge-counter">x</span>
                        @endif
                    @else
                        <img class="img-profile rounded-circle"
                            src="{{ asset('assets/img/illustrations/icons/undraw_profile_3.svg') }}">
                        @if (Auth::guard('registrar')->user()->active == 1)
                            <span class="badge badge-success badge-counter">o</span>
                        @else
                            <span class="badge badge-danger badge-counter">x</span>
                        @endif
                    @endif
                @endif

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

            </div>
        </li>

    </ul>

</nav>
