@extends('admin.cashier-layout.index')

@section('page-title')
    Pending Payments
@endsection
@section('contents')
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                {{-- <a href="#" class="btn btn-primary">
                    <span class="d-flex align-items-center" data-toggle="modal"
                    data-target="#pay"><i class="fa-solid fap-peso"></i>&#160; Add Payment</span>
                </a> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="pending-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student Id</th>
                            <th class="text-center">Student</th>
                            <th class="text-center">Mode of payment</th>
                            <th class="text-center">Payment method</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="text-center">{{ $payment->payment->student->student_id }}</td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center px-2 py-1">
                                        <h5 class="mb-0 text-sm">{{ $payment->payment->student->first_name }}
                                            {{ $payment->payment->student->middle_name }},
                                            {{ $payment->payment->student->last_name }}
                                            </h6>
                                            <p class="text-sm text-secondary mb-0">{{ $payment->payment->student->email }}
                                            </p>
                                    </div>
                                </td>
                                <td class="text-center">{{ $payment->mop }}</td>
                                <td class="text-center">{{ $payment->payment_method }}</td>
                                <td class="text-center">{{ $payment->amount }}</td>
                                <td class="text-center">{{ date('m/d/Y', strtotime($payment->created_at)) }}</td>
                                <td class="d-flex flex-column justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-success btn-sm {{  ($payment->mop == "Bank Deposit") ? 'mb-1' : 'mr-1' }}" data-toggle="modal"
                                        data-target="#payment{{ $payment->id }}">Confim Payment</button>
                                    @include('admin.cashier-layout.payments.pending.modal._payment')
                                   
                                </td>
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
            $('#pending-table').DataTable({
                "ordering": false,
                "info": false
            });
        });
    </script>
@endsection
