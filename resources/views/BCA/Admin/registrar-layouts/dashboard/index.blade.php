@extends('admin.registrar-layouts.index')
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
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
        @if (Auth::guard('registrar')->user()->isRegistrar == 1)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <a href="{{ route('registrar.enrollees.index') }}"
                        class="card-body link-primary text-decoration-none">
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

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{ route('registrar.section.index') }}"
                        class="card-body link-primary text-decoration-none d-hover-warning">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
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
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('registrar.teachers.index') }}" class="card-body link-primary text-decoration-none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Teachers
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
        @endif
    </div>
    <h1 class="h3 mb-4 text-gray-800">Enrollees</h1>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Students</h6>
                    {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
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
                                            class="btn btn-sm btn-info">View</a>
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
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
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
                                            class="btn btn-sm btn-info">View</a>
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
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transferee Students</h6>
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
                                            class="btn btn-sm btn-info">View</a>
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
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-paper-plane"></i>
                                            Resend
                                            Code</a>
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
    </div>
    {{-- <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <!-- Team members / people dashboard card example-->
            <div class="card mb-4">
                <div class="card-header">People</div>
                <div class="card-body">
                    <!-- Item 1-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Sid Rooney</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople1">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 2-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-2.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Keelan Garza</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople2">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 3-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-3.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Kaia Smyth</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople3" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople3">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 4-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-4.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Kerri Kearney</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople4" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople4">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 5-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-5.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Georgina Findlay</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople5" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople5">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item 6-->
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-6.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="#!">Wilf Ingram</a>
                                <div class="small text-muted line-height-normal">Position</div>
                            </div>
                        </div>
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople6" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownPeople6">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-12">
            <!-- Project tracker card example-->
            <div class="card card-header-actions mb-4">
                <div class="card-header">
                    Projects
                    <a class="btn btn-sm btn-primary-soft text-primary" href="#!">Create New</a>
                </div>
                <div class="card-body">
                    <!-- Progress item 1-->
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <div class="fw-bold">Server Setup</div>
                        <div class="small">25%</div>
                    </div>
                    <div class="progress mb-3"><div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>
                    <!-- Progress item 2-->
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <div class="fw-bold">Database Migration</div>
                        <div class="small">50%</div>
                    </div>
                    <div class="progress mb-3"><div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>
                    <!-- Progress item 3-->
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <div class="fw-bold">Version Release</div>
                        <div class="small">75%</div>
                    </div>
                    <div class="progress mb-3"><div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>
                    <!-- Progress item 4-->
                    <div class="d-flex align-items-center justify-content-between small mb-1">
                        <div class="fw-bold">Product Listings</div>
                        <div class="small">100%</div>
                    </div>
                    <div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
