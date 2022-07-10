<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="row">
        @php
            $sy = DB::table('school_years')->get();
            $current = DB::table('school_years')
                ->where('isCurrentViewByCashier', '=', 1)
                ->first();
        @endphp
        <div class="dropdown">
            <button class="btn btn-bca-outline dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-expanded="false">
                SY {{ $current->school_year }}
            </button>
            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                @foreach ($sy as $item)
                    @if ($item->isCurrentViewByCashier != 1)
                        <form action="{{ route('cashier.change.sy', $item->id) }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">{{ $item->school_year }}</button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

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
