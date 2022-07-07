@extends('admin.admin-layouts.index')
@section('page-title')
    Users
@endsection

@section('contents')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800 mr-auto pt-3">@yield('page-title')</h1>
            <div class="col-2 d-flex">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSection">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add User</span>
                </button>
            </div>
        </div>
    </div>
    @include('admin.admin-layouts.users.modal._modal-add')
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="regStudent-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Active</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->password }}</td>
                                <td class="text-center">{{ $user->roles }}</td>
                                <td class="text-center">
                                    @if ($user->active == 1)
                                        <a class="btn btn-sm btn-success rounded"></a>
                                    @else
                                        <a class="btn btn-sm btn-danger rounded"></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
