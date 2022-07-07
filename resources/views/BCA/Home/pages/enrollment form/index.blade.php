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
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('assets/css/hover.css') }}" />
    {{-- school logo --}}
    <link rel="icon" href="{{ asset('assets/img/BCA-Logo.png') }}">
    {{-- html2pdf JS --}}
    <script src="{{ asset('assets/js/html2pdf/html2pdf.bundle.js') }}"></script>

    {{-- Livewire CSS --}}
    @livewireStyles
    <title>{{ config('app.name') }} | Enrollment Form</title>
</head>

<body style="background-color: #E9EBFC;">
    <div class="container">
        <div class="row flex-nowrap mb-3" style="margin-top:50px">
            <center>
                <div class="col-md-7 col-lg-8 col-xl-7">
                    <h1 class="text-center text-white bg-bca py-4 rounded-top">BCA Online Enrolment Form</h1>
                    @livewire('enrollment.form')
                </div>
            </center>
        </div>
    </div>
    {{-- Livewire JS --}}
    @include('sweetalert::alert')
    @livewireScripts
    @stack('scripts')

</body>

</html>
