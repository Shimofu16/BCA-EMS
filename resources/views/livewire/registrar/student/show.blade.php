<div>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card mb-3 border-0 shadow-lg">
                <div class="card-headr justify-align-center mt-3 px-1">
                    @if ($hasFilePhoto)
                        @if ($studentPhoto != null)
                            <img src="{{ asset($studentPhoto->filepath) }}" alt="Student Photo ID"
                                class="img-student rounded-circle mb-3" />
                        @else
                            @if ($student->gender == 'Male')
                                <img src="{{ asset('assets/img/icons/user-male.png') }}" alt="Student Photo ID"
                                    class="img-student rounded-circle mb-3" />
                            @elseif ($student->gender == 'Female')
                                <img src="{{ asset('assets/img/icons/user-female.png') }}" alt="Student Photo ID"
                                    class="img-student rounded-circle mb-3" />
                            @endif
                        @endif
                    @else
                        @if ($student->gender == 'Male')
                            <img src="{{ asset('assets/img/icons/user-male.png') }}" alt="Student Photo ID"
                                class="img-student rounded-circle mb-3" />
                        @elseif ($student->gender == 'Female')
                            <img src="{{ asset('assets/img/icons/user-female.png') }}" alt="Student Photo ID"
                                class="img-student rounded-circle mb-3" />
                        @endif
                    @endif
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title font-weight-bold mb-0">{{ ucfirst($student->first_name) }}
                        {{ substr(ucfirst($student->middle_name), 0, 1) }},
                        {{ ucfirst($student->last_name) }}
                        {{ $student->ext_name !== null ? ucfirst($student->ext_name) : null }}</h4>
                    <p class="card-text">{{ $student->email }}</p>
                    <h5 class="card-title font-weight-bold text-primary mb-0">Grade Level</h5>
                    <p class="card-text ">{{ $student->gradeLevel->grade_name }}</p>
                    <h5 class="card-title font-weight-bold text-primary mb-0">School Year</h5>
                    <p class="card-text ">{{ $student->sy->school_year }}</p>
                    <h5 class="card-title font-weight-bold text-primary mb-0">Status</h5>
                    @if ($student->status == 1)
                        <p class="card-text ">Enrolled</p>
                    @else
                        <p class="card-text ">Not Enrolled</p>
                    @endif
                </div>
            </div>
            <div class="card  border-0 shadow-lg">
                <h3 class="text-primary text-center mt-3">Action</h3>
                <div class="card-body pt-1 d-flex align-items-center flex-column">
                    <div class="col-7 text-center  mb-2">
                        <button type="button" class="btn btn-bca w-100" data-toggle="modal"
                            data-target="#requirements">Requirements</button>

                    </div>
                    @include('BCA.Admin.registrar-layouts.students.enrollees.modal._requirements')
                    @if ($student->status == 0)
                        <div class="col-7 text-center mb-2">
                            <button type="button" class="btn btn-bca w-100" data-toggle="modal"
                                data-target="#accept{{ $student->id }}">Accept</button>
                        </div>
                        @include('BCA.Admin.registrar-layouts.students.enrollees.modal._create')
                    @endif
                    @if ($student->status == 0)
                        <div class="col-7 text-center ">
                            <a href="{{ route('registrar.enrollees.index') }}" class="btn btn-bca w-100">Back</a>
                        </div>
                    @else
                        <div class="col-7 text-center ">
                            <a href="{{ route('registrar.enrolled.index') }}" class="btn btn-bca w-100">Back</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 ml-3 shadow-lg">
            <div class="card my-2 border-0">
                <div class="card-header bg-white mb-3">
                    <ul class="nav nav-tabs card-header-tabs nav-pills mb-1">
                        <li class="nav-item">
                            <a class="nav-link {{ $left == 1 ? 'active' : '' }}" href="#"
                                wire:click='moveLeft'>Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $center == 1 ? 'active' : '' }}" href="#"
                                wire:click='moveCenter'>Parent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $right == 1 ? 'active' : '' }}" href="#"
                                wire:click='moveRight'>Guardian</a>
                        </li>
                    </ul>
                </div>
                @if ($left == 1)
                    <div class="card-body">
                        <h4 class=" text-primary mb-3">Personal Info.</h4>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">LRN:</span>
                                    <span class="card-text">{{ $student->student_lrn }}</span>
                                </h5>

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Student ID:</span>
                                    <span class="card-text">{{ $student->student_id }}</span>
                                </h5>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4  {{ $student->ext_name == null ? 'col-lg-4' : 'col-lg-3' }}">
                                @if ($student->ext_name != null)
                                    <h5>
                                        <span class="card-title font-weight-bold">First Name:</span>
                                    </h5>
                                    <h5>
                                        <span class="card-text">{{ ucfirst($student->first_name) }} </span>
                                    </h5>
                                @else
                                    <h5>
                                        <span class="card-title font-weight-bold">First Name:</span>
                                        <span class="card-text">{{ ucfirst($student->first_name) }} </span>
                                    </h5>
                                @endif


                            </div>
                            <div class="col-md-4 {{ $student->ext_name == null ? 'col-lg-4' : 'col-lg-3' }}">
                                @if ($student->ext_name != null)
                                    <h5>
                                        <span class="card-title font-weight-bold">Middle Name:</span>
                                    </h5>
                                    <h5>
                                        <span class="card-text">{{ ucfirst($student->middle_name) }}</span>
                                    </h5>
                                @else
                                    <h5>
                                        <span class="card-title font-weight-bold">Middle Name:</span>
                                        <span class="card-text">{{ ucfirst($student->middle_name) }}</span>
                                    </h5>
                                @endif

                            </div>
                            <div class="col-md-4 {{ $student->ext_name == null ? 'col-lg-4' : 'col-lg-3' }}">
                                @if ($student->ext_name != null)
                                    <h5>
                                        <span class="card-title font-weight-bold">Last Name:</span>
                                    </h5>
                                    <h5>
                                        <span class="card-text">{{ ucfirst($student->last_name) }}</span>
                                    </h5>
                                @else
                                    <h5>
                                        <span class="card-title font-weight-bold">Last Name:</span>
                                        <span class="card-text">{{ ucfirst($student->last_name) }}</span>
                                    </h5>
                                @endif

                            </div>
                            @if ($student->ext_name != null)
                                <div class="col-md-4 col-lg-3">
                                    <h5>
                                        <span class="card-title font-weight-bold">Ext. Name:</span>
                                    </h5>
                                    <h5>
                                        <span class="card-text">{{ ucfirst($student->ext_name) }}</span>
                                    </h5>

                                </div>
                            @endif

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <h5>
                                    <span class="card-title font-weight-bold">Gender:</span>
                                    <span class="card-text">{{ $student->gender }} </span>
                                </h5>

                            </div>
                            <div class="col-md-4 col-lg-3">
                                <h5>
                                    <span class="card-title font-weight-bold">Age:</span>
                                    <span class="card-text">{{ $student->age }}</span>
                                </h5>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <h5>
                                    <span class="card-title font-weight-bold">Email:</span>
                                    <span class="card-text">{{ $student->email }}</span>
                                </h5>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-3">
                                <h5>
                                    <span class="card-title font-weight-bold">Birthdate:</span>
                                    <span
                                        class="card-text">{{ date('m/d/Y', strtotime($student->birthdate)) }}</span>
                                </h5>

                            </div>
                            <div class="col-md-4 col-lg-5">
                                <h5>
                                    <span class="card-title font-weight-bold">Birthplace:</span>
                                    <p class="card-text">{{ $student->birthplace }}</p>
                                </h5>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-7">
                                <h5>
                                    <span class="card-title font-weight-bold">Address:</span>
                                    <span class="card-text">{{ $student->address }}</span>
                                </h5>

                            </div>
                        </div>
                        <hr class="my-3">
                        <h4 class="text-primary mb-3">Other Info.</h4>
                        <div class="row mb-3">
                            @if ($student->status == 1)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Section:</span>
                                        <span class="card-text">{{ $student->section->section_name }}</span>
                                    </h5>
                                </div>
                            @endif
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Grade Level:</span>
                                    <span class="card-text">{{ $student->gradeLevel->grade_name }}</span>
                                </h5>

                            </div>

                        </div>
                    </div>
                @endif
                @if ($center == 1)
                    <div class="card-body">
                        <h4 class=" text-primary mb-3">Father Info.</h4>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Name:</span>
                                    <span class="card-text">{{ ucfirst($father->name) }}</span>
                                </h5>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Birthdate:</span>
                                    <span
                                        class="card-text">{{ date('m/d/y', strtotime($father->birthdate)) }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if ($father->landline != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Landline:</span>
                                        <span class="card-text">{{ $student->landline }} </span>
                                    </h5>
                                </div>
                            @endif
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Contact:</span>
                                    <span class="card-text">{{ $father->contact_no }}</span>
                                </h5>
                            </div>
                            @if ($father->email != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Email:</span>
                                        <span class="card-text">{{ $father->email }}</span>
                                    </h5>
                                </div>
                            @endif
                        </div>
                        @if ($father->address != null)
                            <div class="row mb-3">
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Address:</span>
                                        <span class="card-text">{{ $father->address }} </span>
                                    </h5>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-7">
                                <h5>
                                    <span class="card-title font-weight-bold">Occupation:</span>
                                    <span class="card-text">{{ $father->occupation }} </span>
                                </h5>
                            </div>
                            @if ($father->office_address != null)
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Office Address:</span>
                                        <span class="card-text">{{ $father->office_address }} </span>
                                    </h5>
                                </div>
                            @endif
                            @if ($father->office_contact_no != null)
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Office Contact No.:</span>
                                        <span class="card-text">{{ $father->office_contact_no }} </span>
                                    </h5>
                                </div>
                            @endif
                        </div>
                        <hr class="my-3">
                        <h4 class="text-primary mb-3">Mother Info.</h4>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Name:</span>
                                    <span class="card-text">{{ ucfirst($mother->name) }}</span>
                                </h5>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Birthdate:</span>
                                    <span
                                        class="card-text">{{ date('m/d/y', strtotime($mother->birthdate)) }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if ($mother->landline != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Landline:</span>
                                        <span class="card-text">{{ $mother->landline }} </span>
                                    </h5>
                                </div>
                            @endif
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Contact:</span>
                                    <span class="card-text">{{ $mother->contact_no }}</span>
                                </h5>
                            </div>
                            @if ($mother->email != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Email:</span>
                                        <span class="card-text">{{ $mother->email }}</span>
                                    </h5>
                                </div>
                            @endif
                        </div>
                        @if ($mother->address != null)
                            <div class="row mb-3">
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Address:</span>
                                        <span class="card-text">{{ $mother->address }} </span>
                                    </h5>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-7">
                                <h5>
                                    <span class="card-title font-weight-bold">Occupation:</span>
                                    <span class="card-text">{{ $mother->occupation }} </span>
                                </h5>
                            </div>
                            @if ($mother->office_address != null)
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Office Address:</span>
                                        <span class="card-text">{{ $mother->office_address }} </span>
                                    </h5>
                                </div>
                            @endif
                            @if ($mother->office_contact_no != null)
                                <div class="col-md-4 col-lg-7">
                                    <h5>
                                        <span class="card-title font-weight-bold">Office Contact No.:</span>
                                        <span class="card-text">{{ $mother->office_contact_no }} </span>
                                    </h5>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($right == 1)
                    <div class="card-body">
                        <h4 class=" text-primary mb-3">Guardian Info.</h4>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Name:</span>
                                    <span class="card-text">{{ ucfirst($guardian->name) }}</span>
                                </h5>

                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Birthdate:</span>
                                    <span
                                        class="card-text">{{ date('m/d/y', strtotime($guardian->birthdate)) }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if ($guardian->landline != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Landline:</span>
                                        <span class="card-text">{{ $student->landline }} </span>
                                    </h5>
                                </div>
                            @endif
                            <div class="col-md-4 col-lg-4">
                                <h5>
                                    <span class="card-title font-weight-bold">Contact:</span>
                                    <span class="card-text">{{ $guardian->contact_no }}</span>
                                </h5>
                            </div>
                            @if ($guardian->email != null)
                                <div class="col-md-4 col-lg-4">
                                    <h5>
                                        <span class="card-title font-weight-bold">Email:</span>
                                        <span class="card-text">{{ $guardian->email }}</span>
                                    </h5>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
