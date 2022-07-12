<div>
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">Confirmed Payments {{ $byGrade ? '- ' . $grade_name : '' }}</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <button class="btn mr-2" wire:click='resetFilters'>
                    Reset Filters
                </button>
                <div class="dropdown mr-2">
                    <button class="btn btn-bca-outline" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Grade Level <i class="fa-solid fa-filter"></i>
                    </button>
                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                        @foreach ($gradeLevels as $gradeLevel)
                            <button type="button"
                                class="dropdown-item {{ $grade_name == $gradeLevel->grade_name ? 'active' : '' }}"
                                wire:click="filterByGradeLevel({{ $gradeLevel->id }})">{{ $gradeLevel->grade_name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($default)
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="pending-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student</th>
                                <th scope="col">Mode of payment</th>
                                <th scope="col">Payment method</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Grade Level</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment->student->student_id }}</td>
                                    <td>
                                        <div class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $payment->payment->student->first_name }}
                                                {{ $payment->payment->student->middle_name }},
                                                {{ $payment->payment->student->last_name }}
                                                </h6>
                                                <p class="text-sm text-secondary mb-0">
                                                    {{ $payment->payment->student->email }}
                                                </p>
                                        </div>
                                    </td>
                                    <td>{{ $payment->mop }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>₱{{ number_format($payment->amount, 2, '.', ',') }}</td>

                                    <td>{{ $payment->gradeLevel->grade_name }}</td>
                                    <td>{{ date('m/d/Y', strtotime($payment->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endif
        @if ($byGrade)
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="pending-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student</th>
                                <th scope="col">Mode of payment</th>
                                <th scope="col">Payment method</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->payment->student->student_id }}</td>
                                    <td>
                                        <div class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $payment->payment->student->first_name }}
                                                {{ $payment->payment->student->middle_name }},
                                                {{ $payment->payment->student->last_name }}
                                                   </h6>
                                                <p class="text-sm text-secondary mb-0">
                                                    {{ $payment->payment->student->email }}
                                                </p>
                                        </div>
                                    </td>
                                    <td>{{ $payment->mop }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ date('m/d/Y', strtotime($payment->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @endif
    </div>
</div>
