@extends('admin.cashier-layout.index')

@section('page-title')
    Confirmed Payments
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
                <table class="table table-bordered table-hover" id="confirmed-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student Id</th>
                            <th class="text-center">Student</th>
                            <th class="text-center">Mode of payment</th>
                            <th class="text-center">Payment method</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="text-center">{{ $payment->payment->student->student_id }}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center px-2 py-1">
                                        <h5 class="mb-0 text-sm">{{ $payment->payment->student->first_name }}
                                            {{ $payment->payment->student->middle_name }}, {{ $payment->payment->student->last_name }}
                                            </h6>
                                            <p class="text-sm text-secondary mb-0">{{ $payment->payment->student->email }}</p>
                                    </div>
                                </td>
                                <td class="text-center">{{ $payment->mop }}</td>
                                <td class="text-center">{{ $payment->payment_method }}</td>
                                <td class="text-center">{{ $payment->amount }}</td>
                                <td class="text-center">{{ date('m/d/Y',strtotime($payment->created_at)) }}</td>
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
            $('#confirmed-table').DataTable({
                "ordering": false,
                "info": false
            });
        });
    </script>
@endsection
