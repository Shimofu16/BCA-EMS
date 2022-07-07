@extends('admin.admin-layouts.adminSidebar')
@section('dashboard-css')

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fullcalendar/main.css') }}">
@endsection

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Calendar</h1>
    <div class="row">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Draggable Events</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="external-event bg-success ui-draggable ui-draggable-handle"
                                            style="position: relative;">Lunch</div>
                                        <div class="external-event bg-warning ui-draggable ui-draggable-handle"
                                            style="position: relative;">Go home</div>
                                        <div class="external-event bg-info ui-draggable ui-draggable-handle"
                                            style="position: relative;">Do homework</div>
                                        <div class="external-event bg-primary ui-draggable ui-draggable-handle"
                                            style="position: relative;">Work on UI design</div>
                                        <div class="external-event bg-danger ui-draggable ui-draggable-handle"
                                            style="position: relative;">Sleep tight</div>
                                        <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                remove after drop
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Create Event</h3>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- /btn-group -->
                                    <div class="input-group">
                                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                                        <div class="input-group-append">
                                            <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                        </div>
                                        <!-- /btn-group -->
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                                    <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                                        <div class="fc-toolbar-chunk">
                                            <div class="btn-group"><button class="fc-prev-button btn btn-primary"
                                                    type="button" aria-label="prev"><span
                                                        class="fa fa-chevron-left"></span></button><button
                                                    class="fc-next-button btn btn-primary" type="button"
                                                    aria-label="next"><span class="fa fa-chevron-right"></span></button>
                                            </div><button class="fc-today-button btn btn-primary"
                                                type="button">today</button>
                                        </div>
                                        <div class="fc-toolbar-chunk">
                                            <h2 class="fc-toolbar-title">January 2022</h2>
                                        </div>
                                        <div class="fc-toolbar-chunk">
                                            <div class="btn-group"><button
                                                    class="fc-dayGridMonth-button btn btn-primary active"
                                                    type="button">month</button><button
                                                    class="fc-timeGridWeek-button btn btn-primary"
                                                    type="button">week</button><button
                                                    class="fc-timeGridDay-button btn btn-primary" type="button">day</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fc-view-harness fc-view-harness-active" style="height: 632.593px;">
                                        <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                            <table class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                                                <thead>
                                                    <tr class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                                        <td>
                                                            <div class="fc-scroller-harness">
                                                                <div class="fc-scroller" style="overflow: hidden;">
                                                                    <table class="fc-col-header " style="width: 852px;">
                                                                        <colgroup></colgroup>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-sun">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Sun</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-mon">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Mon</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-tue">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Tue</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-wed">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Wed</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-thu">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Thu</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-fri">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Fri</a>
                                                                                    </div>
                                                                                </th>
                                                                                <th
                                                                                    class="fc-col-header-cell fc-day fc-day-sat">
                                                                                    <div class="fc-scrollgrid-sync-inner"><a
                                                                                            class="fc-col-header-cell-cushion ">Sat</a>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                                        <td>
                                                            <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                                <div class="fc-scroller fc-scroller-liquid-absolute"
                                                                    style="overflow: hidden auto;">
                                                                    <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
                                                                        style="width: 852px;">
                                                                        <table class="fc-scrollgrid-sync-table"
                                                                            style="width: 852px; height: 600px;">
                                                                            <colgroup></colgroup>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other"
                                                                                        data-date="2021-12-26">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">26</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other"
                                                                                        data-date="2021-12-27">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">27</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                                                                                        data-date="2021-12-28">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">28</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                                <div
                                                                                                    class="fc-daygrid-event-harness">
                                                                                                    <a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future"
                                                                                                        href="https://www.google.com/">
                                                                                                        <div class="fc-daygrid-event-dot"
                                                                                                            style="border-color: rgb(60, 141, 188);">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="fc-event-time">
                                                                                                            12a</div>
                                                                                                        <div
                                                                                                            class="fc-event-title">
                                                                                                            Click for Google
                                                                                                        </div>
                                                                                                    </a></div>
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                                                                                        data-date="2021-12-29">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">29</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                                                                                        data-date="2021-12-30">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">30</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                                                                                        data-date="2021-12-31">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">31</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                        data-date="2022-01-01">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">1</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                                        data-date="2022-01-02">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">2</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future"
                                                                                        data-date="2022-01-03">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">3</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future"
                                                                                        data-date="2022-01-04">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">4</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future"
                                                                                        data-date="2022-01-05">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">5</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future"
                                                                                        data-date="2022-01-06">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">6</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                                        data-date="2022-01-07">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">7</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                        data-date="2022-01-08">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">8</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                                        data-date="2022-01-09">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">9</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future"
                                                                                        data-date="2022-01-10">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">10</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future"
                                                                                        data-date="2022-01-11">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">11</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future"
                                                                                        data-date="2022-01-12">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">12</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future"
                                                                                        data-date="2022-01-13">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">13</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                                        data-date="2022-01-14">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">14</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                        data-date="2022-01-15">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">15</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                                        data-date="2022-01-16">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">16</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future"
                                                                                        data-date="2022-01-17">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">17</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future"
                                                                                        data-date="2022-01-18">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">18</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future"
                                                                                        data-date="2022-01-19">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">19</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future"
                                                                                        data-date="2022-01-20">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">20</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                                        data-date="2022-01-21">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">21</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                        data-date="2022-01-22">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">22</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                                        data-date="2022-01-23">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">23</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future"
                                                                                        data-date="2022-01-24">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">24</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future"
                                                                                        data-date="2022-01-25">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">25</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future"
                                                                                        data-date="2022-01-26">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">26</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future"
                                                                                        data-date="2022-01-27">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">27</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future"
                                                                                        data-date="2022-01-28">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">28</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future"
                                                                                        data-date="2022-01-29">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">29</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future"
                                                                                        data-date="2022-01-30">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">30</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future"
                                                                                        data-date="2022-01-31">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">31</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other"
                                                                                        data-date="2022-02-01">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">1</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other"
                                                                                        data-date="2022-02-02">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">2</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other"
                                                                                        data-date="2022-02-03">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">3</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other"
                                                                                        data-date="2022-02-04">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">4</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other"
                                                                                        data-date="2022-02-05">
                                                                                        <div
                                                                                            class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                            <div
                                                                                                class="fc-daygrid-day-top">
                                                                                                <a
                                                                                                    class="fc-daygrid-day-number">5</a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="fc-daygrid-day-events">
                                                                                            </div>
                                                                                            <div class="fc-daygrid-day-bg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('dashboard-js')
    <!-- jQuery -->
    {{-- <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap -->
{{--     <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- jQuery UI -->
    <script src="{{ asset('vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
   {{--  <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script> --}}
    <!-- fullCalendar 2.2.5 -->
{{--     <script src="{{ asset('vendor/adminlte/plugins/moment/moment.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/adminlte/plugins/fullcalendar/main.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: true
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor: '#0073b7' //Blue
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor: '#00c0ef' //Info (aqua)
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor: '#00a65a' //Success (green)
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'https://www.google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>
@endsection
