@extends('BCA.Admin.student-layouts.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Sutudent Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱ {{ number_format($student->balance, 2, '.', ',') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Confirmed Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paymentCount1 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-circle-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $paymentCount0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Payment History</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id="payments" width="100%">
                                    <thead>
                                        <tr role="row">
                                            <th scope="col">Payment No.</th>
                                            <th scope="col">Mode of Payment</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paymentLogs as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->mop }}</td>
                                                <td>{{ $item->payment_method }}</td>
                                                <td>₱ {{ number_format($item->amount, 2, '.', ',') }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        @if ($item->status == 1)
                                                            <button class="btn-success rounded-pill">&nbsp;&nbsp;</button>
                                                        @else
                                                            <button class="btn-danger rounded-pill">&nbsp;&nbsp;</button>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ date('m/d/Y', strtotime($item->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#payments-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
