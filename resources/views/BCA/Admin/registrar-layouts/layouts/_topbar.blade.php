<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="row">
        <div class="col-md-12">
            @php
                $sy = DB::table('school_years')->get();
                $current = DB::table('school_years')
                    ->where('isCurrent', '=', 1)
                    ->first()->school_year;
            @endphp
            @csrf
            @method('post')
            <div class="dropdown">
                <button class="btn btn-bca-outline dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    SY {{ $current }}
                </button>
                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                    @foreach ($sy as $item)
                        @if ($item->isCurrent != 1)
                            <form action="{{ route('change.sy', $item->id) }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">{{ $item->school_year }}</button>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Search -->
    {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- Nav Item - Alerts -->
        {{-- <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">
                 @if ($unregStudentCount > 10)
                        {{ $unregStudentCount }}+
                    @else
                        {{ $unregStudentCount }}
                    @endif
                </span>
            </a>
        <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifications
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-bold">Donation</span>
                        <hr class="my-0">
                        <span class="font-weight-bold pt-3">Sender: Roy Joseph Latayan</span>
                        <div class="small text-gray-500">December 23, 2021</div>
                    </div>
                </a>

                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li> --}}

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
