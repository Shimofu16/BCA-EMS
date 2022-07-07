@extends('admin.cashier-layout.index')

@section('page-title')
    Payments
@endsection
@section('contents')
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                {{-- <a href="{{ route('registrar.enrollees.list') }}" class="btn btn-primary mr-5">
                <span class="d-flex align-items-center"><i class="fa-solid fa-download"></i>&#160; Download Student List</span>
            </a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="students-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student Id</th>
                            <th class="text-center">Student</th>
                            <th class="text-center">Balance</th>
                            <th class="text-center">Reminder at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="text-center">{{ $payment->student->student_id}}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center px-2 py-1">
                                        <h5 class="mb-0 text-sm">{{ $payment->student->first_name }}
                                            {{ $payment->student->middle_name }}, {{ $payment->student->last_name }}
                                        </h6>
                                        <p class="text-sm text-secondary mb-0">{{ $payment->student->email }}</p>
                                    </div>
                                </td>
                                <td class="text-center">{{ $payment->balance }}</td>
                                <td class="text-center">{{ date('m/d/Y', strtotime($payment->reminder_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('dashboard-javascript')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#students-table').DataTable({
                "ordering": false,
                "info": false
            });
        });
    </script>
@endsection
