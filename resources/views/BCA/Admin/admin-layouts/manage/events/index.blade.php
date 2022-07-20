@extends('BCA.Admin.admin-layouts.index')
@section('page-title')
    Events
@endsection
@section('contents')
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Event</span>
                </button>
                @include('BCA.Admin.admin-layouts.manage.events.modal._add')
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="events-table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Event No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ date('m/d/Y', strtotime($event->start)) }} -
                                    {{ date('m/d/Y', strtotime($event->end)) }}</td>
                                <td>{{ date('h:i:s A', strtotime($event->time)) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#edit{{ $event->id }}">Edit</a>
                                    <a class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#delete{{ $event->id }}">Delete</a>
                                </td>
                                @include('BCA.Admin.admin-layouts.manage.events.modal._edit')
                                @include('BCA.Admin.admin-layouts.manage.events.modal._delete')
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#events-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
