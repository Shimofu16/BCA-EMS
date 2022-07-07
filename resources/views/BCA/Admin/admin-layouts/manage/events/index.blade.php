@extends('admin.admin-layouts.index')
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Event</span>
                </button>
                @include('admin.admin-layouts.manage.events.modal._add')
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="events-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Event No.</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="text-center">{{ $event->id }}</td>
                                <td class="text-center">{{ $event->title }}</td>
                                <td class="text-center">{{ date('m/d/Y', strtotime($event->start)) }} - {{  date('m/d/Y', strtotime($event->end)) }}</td>
                                <td class="text-center">{{ date('h:i:s A', strtotime($event->time)) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $event->id }}">Edit</a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $event->id }}">Delete</a>
                                </td>
                                @include('admin.admin-layouts.manage.events.modal._edit')
                                @include('admin.admin-layouts.manage.events.modal._delete')
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#events-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
