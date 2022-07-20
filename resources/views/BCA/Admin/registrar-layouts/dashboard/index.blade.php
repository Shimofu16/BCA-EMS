@extends('BCA.Admin.registrar-layouts.index')
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
       {{--  @if ($isCurrentSy) --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('registrar.enrolled.index') }}" class="card-body link-primary text-decoration-none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Enrolled Student</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $enrolledCount }}</div>
                            </div>
                            <div class="col-auto ">

                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </a>
                    {{-- <div class="card-body">

            </div> --}}
                </div>
            </div>
       {{--  @endif --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <a href="{{ route('registrar.enrollees.index') }}" class="card-body link-primary text-decoration-none">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Enrollee Students
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $enrolleeCount }}
                                    </div>
                                </div>
                                {{-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        {{-- @if ($isCurrentSy) --}}
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <a href="{{ route('registrar.section.index.grade.levels') }}"
                            class="card-body link-primary text-decoration-none d-hover-primary">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Sections</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sectionCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-object-ungroup fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <a href="{{ route('registrar.teachers.index') }}" class="card-body link-primary text-decoration-none">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Teachers
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $teacherCount }}</div>
                                        </div>
                                        {{-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> --}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        {{-- @endif --}}
    </div>
    <h1 class="h3 mb-4 text-gray-800">Enrollees</h1>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Students</h6>
                 <div>
                    {{ $newStudentsCount }}
                 </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Student LRN</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Year Level</th>
                                <th class="text-center">More details</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($newStudents as $student)
                                <tr>
                                    <td class="text-center">{{ $student->student_lrn }}</td>
                                    <td class="text-center">{{ ucfirst($student->first_name) }}
                                        {{ substr(ucfirst($student->middle_name), 0, 1) }} ,
                                        {{ ucfirst($student->last_name) }}</td>
                                    <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrar.enrollees.show', $student->id) }}"
                                            class="btn btn-sm btn-outline-info">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd ">
                                    <td valign="top" colspan="9" class="text-center dataTables_empty">No data available
                                        in table</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Old Students</h6>
                    <div>
                        {{ $oldStudentsCount }}/{{ $oldStudentsCountTotal }}
                     </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Student LRN</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Year Level</th>
                                <th class="text-center">More details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($oldStudents as $student)
                                <tr>
                                    <td class="text-center">{{ $student->student_lrn }}</td>
                                    <td class="text-center">{{ ucfirst($student->first_name) }}
                                        {{ substr(ucfirst($student->middle_name), 0, 1) }} ,
                                        {{ ucfirst($student->last_name) }}</td>
                                    <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrar.enrollees.show', $student->id) }}"
                                            class="btn btn-sm btn-outline-info">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd ">
                                    <td valign="top" colspan="9" class="text-center dataTables_empty">No data
                                        available
                                        in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transferee Students</h6>
                    <div>
                        {{ $transfereeStudentsCount }}
                     </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="enrolled-table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Student LRN</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Year Level</th>
                                <th class="text-center">More details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transfereeStudents as $student)
                                <tr>
                                    <td class="text-center">{{ $student->student_lrn }}</td>
                                    <td class="text-center">{{ ucfirst($student->first_name) }}
                                        {{ substr(ucfirst($student->middle_name), 0, 1) }} ,
                                        {{ ucfirst($student->last_name) }}</td>
                                    <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrar.enrollees.show', $student->id) }}"
                                            class="btn btn-sm btn-outline-info">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd ">
                                    <td valign="top" colspan="9" class="text-center dataTables_empty">No data
                                        available
                                        in table</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       {{--  @if ($isCurrentSy) --}}
            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Unverified Emails</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="enrolled-table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Student LRN</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($unverifiedStudents as $student)
                                    <tr>
                                        <td class="text-center">{{ $student->student_lrn }}</td>
                                        <td class="text-center">{{ ucfirst($student->first_name) }}
                                            {{ substr(ucfirst($student->middle_name), 0, 1) }},
                                            {{ ucfirst($student->last_name) }}</td>
                                        <td class="text-center">{{ $student->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('registrar.enrollees.show', $student->id) }}"
                                                class="btn btn-sm btn-outline-primary"><i
                                                    class="fa-solid fa-paper-plane"></i>
                                                Resend
                                                Code</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="odd ">
                                        <td valign="top" colspan="9" class="text-center dataTables_empty">No data
                                            available
                                            in table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- @endif --}}
    </div>
@endsection
