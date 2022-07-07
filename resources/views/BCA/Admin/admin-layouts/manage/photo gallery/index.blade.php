@extends('admin.admin-layouts.index')
@section('page-title')Photo Gallery @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <div class="row align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-2">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a  class="btn btn-primary mr-5" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Photo</span>
                </a>
                @include('admin.admin-layouts.manage.photo gallery.modal._add')
            </div>
        </div>
    </div>
    <a  class="btn btn-primary mr-5" href="{{ route('gallery.test') }}" >
        <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Photo</span>
    </a>
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="img-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Image Name</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                        <tr>
                            <td class="text-center">{{ $photo->title }}</td>
                            <td class="text-center">{{ $photo->img_name }}</td>
                            <td class="text-center">{{ date('m / d / Y',strtotime($photo->date)) }}</td>
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
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#img-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
