<section>
    <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" class="active" data-bs-slide-to="0" aria-label="Slide 1"
                class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active fade-in-fwd" data-interval="3000">
                <img class="first-slide" alt="First slide"
                    src="{{ asset('./uploads/slider/nursery 3.jpg') }}">
                <div class="container">
                    <div class="carousel-caption d-flex flex-column align-items-end">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <h1 class="bg-secondary bg-opacity-50 w-fit p-2 rounded-pill">Nursery</h1>
                            <p class="bg-secondary bg-opacity-50 w-fit p-1 ">Some information about nursery
                            </p>
                            <p><a class="btn btn-lg btn-bca" href="{{ route('nursery.index') }}">Learn more <i
                                        class="fa-solid fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item fade-in" data-interval="3000">
                <img class="second-slide" src="{{ asset('./uploads/slider/lower elem.jpg') }}" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption d-flex flex-column align-items-start">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <h1 class="bg-secondary bg-opacity-50 align-self-center w-fit p-2 rounded-pill">
                                Elementary.</h1>
                            <p class="bg-secondary bg-opacity-50 align-self-center w-fit p-1">Some
                                information about Elementary</p>
                            <p><a class="btn btn-lg btn-bca" href="{{ route('elementary.index') }}">Learn more <i
                                        class="fa-solid fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item fade-in-right " data-interval="3000">

                <img class="third-slide"src="{{ asset('./uploads/slider/junior highschool.jpg') }}"
                    alt="Fourth slide">
                <div class="container">
                    <div class="carousel-caption d-flex flex-column align-items-end">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <h1 class="bg-secondary bg-opacity-50 align-self-center w-fit p-2 rounded-pill">
                                Junior
                                Highschool</h1>
                            <p class="bg-secondary bg-opacity-50 align-self-center w-fit p-1">Some
                                Information
                                about Juior Highschool.</p>
                            <p><a class="btn btn-lg btn-bca" href="{{ route('juniorhighschool.index') }}">Learn more
                                    <i class="fa-solid fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section>
    <div class="container-sm my-4">
        <div class="row justify-content-center">
            <div class="col-lg-3  col-md-4">
                <div class="d-flex justify-content-center align-items-center flex-column ">
                    <div class="icon-bordered hvr-sweep-to-bottom">
                        <a href="{{ route('enroll.index') }}">
                            <i class="fa-solid fa-book"></i>
                        </a>
                    </div>
                    <h3 class="mt-1">Enroll now!</h3>
                    <p class="icon-sub-title">&nbsp;</p>
                    <p><a class="btn btn-bca" href="{{ route('enroll.index') }}">View details »</a></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="d-flex justify-content-center align-items-center flex-column ">
                    <div class="icon-bordered hvr-sweep-to-bottom">
                        <a href="{{ route('calendar.index') }}">
                            <i class="fa-solid fa-calendar-days"></i>
                        </a>
                    </div>
                    <h3 class="mt-1">Academic Calendar</h3>
                    <p class="icon-sub-title">School Calendar and upcoming events.</p>
                    <p><a class="btn btn-bca" href="{{ route('calendar.index') }}">View details »</a></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="icon-bordered hvr-sweep-to-bottom">
                        <a href="https://www.facebook.com/Breakthrough-Christian-Academy-146316647685">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>
                    <h3 class="mt-1">Social</h3>
                    <p class="icon-sub-title">Visit our Facebook page.</p>
                    <p><a class="btn btn-bca"
                            href="https://www.facebook.com/Breakthrough-Christian-Academy-146316647685">View details
                            »</a></p>
                </div>
            </div>

        </div>

    </div>
</section>
