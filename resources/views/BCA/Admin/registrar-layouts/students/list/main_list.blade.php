<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.0.0-web/css/all.css') }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/home/customV2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home/footer.css') }}" />
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    {{-- school logo --}}
    <link rel="icon" href="{{ asset('img/BCA-Logo.png') }}">
    {{-- page level css --}}
    @yield('page_level_css')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <!-- navigation bar -->
    <div class="titles">
        <center class="d-flex justify-content-center mt-5 mb-4">
            <img src="{{ asset('assets/img/BCA-Logo.png') }}" alt="bca logo" class="myLogo me-0">
            <div class="col-md-5 col-lg-7">
                    <h3>BREAKTHROUGH CHRISTIAN ACADEMY</h3>
                    <h4>9006 Eagle St., Area 3, Sitio Veterans, Brgy. Bagong Silangan, Quezon City</h4>
            </div>
        </center>
        <center>
            <h4 class="fw-bold text-upper ps-lg-2">OFFICIAL CLASS LIST</h4>
            <h6 class="text-upper ps-lg-2">SY 2022 - 2023</h6>
        </center>
    </div>
    <center class="">
        <div class="col-md-8 col-lg-8">
            @yield('list')
        </div>
    </center>
    <!-- footer -->

    <!-- JS Libraies -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/dist/popover.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>

    @yield('page_level_js')
</body>

</html>
