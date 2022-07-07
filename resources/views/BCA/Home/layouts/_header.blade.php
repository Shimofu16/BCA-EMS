<header>
    <nav class="navbar navbar-expand-lg fixed-top bg-bca-nav shadow">
        <div class="container-lg d-flex justify-content-between align-content-center">
            <a class="navbar-brand d-flex justify-content-center align-content-center"
                href="{{ route('home.index') }}">
                <img src="{{ asset('assets/img/BCA-Logo.png') }}" alt="" class="myLogo">
                <h2 class="text-bca my-auto navbar-title"> Breakthrough Christian Academy</h2>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="navbar-toggler-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse flex-grow-0 md-scale-in-tr" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-line mx-1 {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home.index') }}" class="nav-link hover-bca p-3 text-bca">Home</a>
                    </li>
                    <li class="nav-item nav-line mx-1 dropdown {{ Request::is('aboutus') ? 'active' : '' }}">
                        <a class="nav-link  hover-bca p-3 text-bca" href="{{ route('about.index') }}">About us</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="{{ route('about.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd">Mission and Vision</a>
                            </li>
                            <li><a href="{{ route('about.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd">History</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item nav-line mx-1 dropdown {{ Request::is('academics/*', 'academics') ? 'active' : '' }}">
                        <a href="{{ route('academics.index') }}" class="nav-link hover-bca  p-3">Academics</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="{{ route('primary.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/primary', 'academics/primary/*') ? 'active-dd' : '' }}">Primary
                                    &#160;&#160;&#160;&#160;&#160;&#160;<i class="fa-solid fa-angle-right"></i></a>
                                <ul class="submenu dropdown-menu bg-bca">
                                    <li><a href="{{ route('nursery.index') }}"
                                            class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/primary/nursery') ? 'active-submenu' : '' }}">Nursery</a>
                                    </li>
                                    <li><a href="{{ route('kindergarten.index') }}"
                                            class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/primary/kindergarten') ? 'active-submenu' : '' }}">Kindergarten</a>
                                    </li>
                                    <li><a href="{{ route('preparatory.index') }}"
                                            class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/primary/preparatory') ? 'active-submenu' : '' }}">Preparatory</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('elementary.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/elementary', 'academics/elementary/*') ? 'active-dd' : '' }}">Elementary</a>
                            </li>
                            <li><a href="{{ route('juniorhighschool.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd {{ Request::is('academics/junior highschool', 'academics/junior highschool/*') ? 'active-dd' : '' }}">Juior
                                    Highschool</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item nav-line mx-1 dropdown {{ Request::is('enroll', 'calendar') ? 'active' : '' }}">
                        <a href="#" class="nav-link  hover-bca p-3 text-bca">Student</a>
                        <ul class="dropdown-menu bg-bca" id="dd">
                            <li><a href="{{ route('portal.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd">Portal</a>
                            </li>
                            <li><a href="{{ route('calendar.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd  {{ Request::is('calendar') ? 'active-dd' : '' }}">
                                    Calendar</a>
                            </li>
                            <li><a href="{{ route('enroll.index') }}"
                                    class="dropdown-item p-3 text-light hover-bca-dd">Enroll</a>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
