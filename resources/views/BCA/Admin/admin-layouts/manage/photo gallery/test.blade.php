<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.0.0-web/css/all.css') }}">
    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/home/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/home/pages/home/carousel.css') }}">
    {{-- hover effects --}}
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    {{--  school logo  --}}
    <link rel="icon" href="{{ asset('./img/BCA-Logo.png') }}">
    <title>Document</title>
</head>
<body>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
        @foreach ($photos as $photo)
            <div class="carousel-item active">
                <img class="first-slide" src="{{ asset('img/announcements/'.$photo->ing) }}" alt="First slide">
                <div class="container">
                  {{--    <div class="carousel-caption text-left">
                        <h1>Example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                    </div>  --}}
                </div>
            </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap copy/js/dist/popover.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap copy/dist/js/bootstrap.min.js' )}}"></script>

</body>
</html>
