@extends('homepage.index')
@section('title')
    <span class="text-bca">C</span>alendar
@endsection
@section('page-title')
    <li class="breadcrumb-item" aria-current="page">Calendar</li>
@endsection
@section('page_level_css')
    <link rel="stylesheet" href="{{ asset('assets/css/plain admin full calendar/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plain admin full calendar/fullcalendar.css') }}" />
    <script>
        // ====== calendar activation
        document.addEventListener("DOMContentLoaded", function() {
            var calendarFullEl = document.getElementById("calendar-full");
            var calendarFull = new FullCalendar.Calendar(calendarFullEl, {
                timeZone: 'Asia/Manila',
                initialView: "dayGridMonth",
                themeSystem: 'standard',
                headerToolbar: {
                    end: "today prev,next",
                },
                events: [
                    @foreach ($events as $event)
                        {
                            title: '{{ $event->title }}',
                            start: '{{  $event->start }}{{ $event->time != null ? 'T' . $event->time : null }}',
                            end: '{{ $event->end }}',
                            url: '',
                            color: '{{ $event->color != null ? $event->color : '#2e45e0' }}',
                        },
                    @endforeach
                ],

            });
            calendarFull.render();

        });

    </script>
@endsection
@section('contents')
    {{-- page titles --}}
    <section>
        <div class="container-sm">
            @include('BCA.Home.pages.partials._pageTitle')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style calendar-card mb-5">
                        <div id="calendar-full" class="fc fc-media-screen fc-direction-ltr fc-theme-standard">

                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
        </div>
    </section>
@endsection

@section('page_level_js')
    <script src="{{ asset('assets/js/plain admin full calendar/fullcalendar.js') }}"></script>
@endsection
