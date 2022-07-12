<div>
    <div class="row shadow align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 m-0 py-3">Students {{ $byGrade ? '- ' . $grade->grade_name : '' }}</h1>
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
                            @if ($byGrade)
                                <button type="button"
                                    class="dropdown-item {{ $grade->grade_name == $gradeLevel->grade_name ? 'active' : '' }}"
                                    wire:click="filterByGradeLevel({{ $gradeLevel->id }})">{{ $gradeLevel->grade_name }}
                                </button>
                            @else
                                <button type="button" class="dropdown-item"
                                    wire:click="filterByGradeLevel({{ $gradeLevel->id }})">{{ $gradeLevel->grade_name }}
                                </button>
                            @endif
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
                    <table class="table table-bordered table-hover" id="students-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Grade Level</th>
                                <th scope="col">Reminder at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->student->student_id }}</td>
                                    <td>
                                        <div
                                            class="d-flex flex-column px-2 py-1">
                                            <h5 class="mb-0 text-sm">{{ $payment->student->first_name }}
                                                {{ $payment->student->middle_name }},
                                                {{ $payment->student->last_name }}
                                                </h6>
                                                <p class="text-sm text-secondary mb-0">{{ $payment->student->email }}
                                                </p>
                                        </div>
                                    </td>
                                    <td>₱ {{ number_format($payment->balance, 2, '.', ',') }}</td>
                                    <td>{{ $payment->student->gradeLevel->grade_name }}</td>
                                    <td>{{ date('m/d/Y', strtotime($payment->reminder_at)) }}
                                    </td>
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
                    <table class="table table-bordered table-hover" id="students-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Reminder at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                @if ($payment->student->grade_level_id == $grade->id)
                                    <tr>
                                        <td>{{ $payment->student->student_id }}</td>
                                        <td>
                                            <div
                                                class="d-flex flex-column px-2 py-1">
                                                <h5 class="mb-0 text-sm">{{ $payment->student->first_name }}
                                                    {{ $payment->student->middle_name }},
                                                    {{ $payment->student->last_name }}
                                                    </h6>
                                                    <p class="text-sm text-secondary mb-0">
                                                        {{ $payment->student->email }}
                                                    </p>
                                            </div>
                                        <td>₱ {{ number_format($payment->balance, 2, '.', ',') }}</td>
                                        <td>{{ date('m/d/Y', strtotime($payment->reminder_at)) }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
