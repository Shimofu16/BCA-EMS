<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free-6.0.0-web/css/all.css') }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/home/customV2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/home/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/home/footer.css') }}" />
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('assets/css/hover.css') }}" />
    {{--  school logo  --}}
    <link rel="icon" href="{{ asset('img/BCA-Logo.png') }}">
    {{-- page level css --}}
    @yield('page_level_css')
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <!-- navigation bar -->
    @include('BCA.Home.layouts._header')
    <main class="custom-pt mb-3">
        @yield('contents')
    </main>
    <!-- footer -->
    @include('BCA.Home.layouts._footer')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/dist/popover.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>

    @yield('page_level_js')
</body>
</html>
