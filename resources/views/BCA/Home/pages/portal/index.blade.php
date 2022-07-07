<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    {{-- bootstrap --}}
    <link href="{{ asset('css/sb-admin/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/home/custom.css') }}" />
    {{-- hover effects --}}
    {{-- school logo --}}
    <link rel="icon" href="{{ asset('img/BCA-Logo.png') }}">
    {{-- page level css --}}

    @yield('page_level_css')
    <title>{{ config('app.name') }} | Portal</title>
</head>

<body class="bg-bca">
    @include('sweetalert::alert')

    <div class="container mt-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ asset('img/students/Pre-School/nursery.jpg') }}" alt="login"
                                    class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-5 px-5">
                                    <div class="text-center">
                                        <a class="" href="{{ route('special.index') }}">
                                            <img src="{{ asset('img/BCA-Logo.png') }}" alt="" class="loginLogo mb-2">
                                        </a>
                                        <h1 class="h4 text-gray-900 mb-2">@yield('title')</h1>
                                        @yield('message')
                                    </div>
                                    @yield('forms')
                                    <hr>
                                    @if (Request::is(!'/resend/verification'))
                                        <div class="text-center">
                                            <a class="small" href=" # ">Forgot Password?</a>
                                        </div>
                                    @endif
                                    @if (Session::get('active'))
                                        <div class="text-center">
                                            <a class="small" href=" {{ route('otp') }} ">Send OTP</a>
                                        </div>
                                    @else
                                        @yield('back')
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>
