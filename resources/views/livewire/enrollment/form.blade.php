<div>
    @if ($currentStep == 0)
        @if ($downloadFiles)
            <div class="bg-white" style="width: 756px;">
                <div class="mt-2 d-flex justify-content-center">
                    <button class="btn btn-bca-outline text-bca hvr-sweep-to-bottom" type="button" id="rep"
                        wire:loading.attr="disabled" value="Print" onclick="donwload()" wire:click="download()"><i
                            class="fa-solid fa-download"></i>
                        Download</button>
                    <button class="btn btn-bca-outline text-bca hvr-sweep-to-bottom ms-2" wire:loading.attr="disabled"
                        type="button" wire:click="downloadEForm"><i class="fa-solid fa-download"></i> Back</button>
                </div>
                <hr>
                <div class="mb-5 mt-3 d-flex justify-align-center">
                    <main class="px-5">
                        <div id="donwload-content">
                            @foreach ($ecopies as $item)
                                <div class="student-copy">
                                    <div
                                        class="d-flex justify-content-center align-items-center bg-white border-0 text-center mt-3">
                                        <div class="left">
                                            <img src="{{ asset('assets/img/BCA-Logo.png') }}" alt="BCA LOGO"
                                                class="myLogo">
                                        </div>
                                        <div class="text-center">
                                            <h4 class="fw-bold mb-0 pt-3">BREAKTHROUGH CHRISTIAN ACADEMY</h4>
                                            <p class="m-0 p-0">9006 Eagle St., Area 3, Sitio Veterans,
                                                Brgy.
                                                Bagong
                                                Silangan, Quezon
                                                City</p>
                                            <p class="m-0 p-0 me-5">990 5970 </p>
                                        </div>
                                    </div>
                                    <div class=" d-flex flex-column justify-content-center align-content-center">
                                        <h5 class="fw-bold text-center text-capitalize">ENROLMENT FORM -
                                            {{ $item }} COPY</h5>
                                        <div class="row justify-align-center">
                                            <div class="col-3">
                                                <p>
                                                    @if ($preschool)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Preschool</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($elem)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Elementary</span>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    @if ($jhs)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Junior High School</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Student No. / LRN:</span>
                                            </div>
                                            <div class="w-30 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $student_id }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Incoming Grade Level:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $grade_level }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">School Year:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500 text-center">{{ $sy }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2 name">
                                            <div class="w-min-content pe-0">
                                                <span class="fontsize-17-fw-500">Name:</span>
                                            </div>
                                            <div class="w-40 border-end-dark border-bottom-dark lastname">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($last_name) }}</span>
                                            </div>
                                            <div class="w-40 border-end-dark border-bottom-dark firstname">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($first_name) }}</span>
                                            </div>
                                            <div
                                                class="w-min-content  border-end-dark  border-bottom-dark middleinitial">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst(Str::of($middle_name)->substr(0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Address:</span>
                                            </div>
                                            <div class="w-80 border-bottom-dark">
                                                <span class="fontsize-17-fw-500 text-center">{{ $address }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Birthplace:</span>
                                            </div>
                                            <div class="w-40 border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500">{{ Str::ucfirst($birthplace) }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Birthday:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500">{{ date('m/d/Y', strtotime($birthdate)) }}</span>
                                            </div>

                                        </div>
                                        <h5 class="my-2 text-start">Guardian Details:</h5>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Name:</span>
                                            </div>
                                            <div class="w-40 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_name }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Contact Details:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_contact }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Address:</span>
                                            </div>
                                            <div class="w-45 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_address }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Email:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_email }}</span>
                                            </div>

                                        </div>
                                        <h6 class="mt-2 text-start">I certify that the information above are
                                            true
                                            and
                                            correct.</h6>
                                        <div class="row mx-2 custom-border  custom-h-25">
                                            <div class="w-40 border-end-dark">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                            <div class="w-30 border-end-dark">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="w-40">
                                                <div class="text-center">
                                                    <span class="h6">Parent / Guardian
                                                        Signature</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-center">
                                                    <span class="h6">Admin Officer</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-center">
                                                    <span class="h6">Head Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mt-2">NOTE: Reservation fee upon enrolment is
                                            non-refundable.
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-align-center" id="page-cut">
                                    <i class="fa-solid fa-scissors"></i>
                                    <div class="border-dashed w-100 h-0"></div>
                                </div>
                            @endforeach
                        </div>
                        <div id="donwload-content2">
                            @foreach ($pcopies as $item)
                                <div class="student-copy">
                                    <div
                                        class="d-flex justify-content-center align-items-center bg-white border-0 text-center mt-3 position-relative">
                                        <div class="left">
                                            <img src="{{ asset('assets/img/BCA-Logo.png') }}" alt="BCA LOGO"
                                                class="myLogo">
                                        </div>
                                        <div class="text-center">
                                            <h4 class="fw-bold mb-0 pt-3">BREAKTHROUGH CHRISTIAN ACADEMY</h4>
                                            <p class="m-0 p-0 mb-3">9006 Eagle St., Area 3, Sitio Veterans,
                                                Brgy.
                                                Bagong
                                                Silangan, Quezon
                                                City</p>
                                        </div>
                                    </div>
                                    <div class=" d-flex flex-column justify-content-center align-content-center">
                                        <h5 class="fw-bold text-center">PAYMENT FORM - {{ $item }}
                                            COPY
                                        </h5>
                                        <div class="row justify-align-center">
                                            <div class="col-3">
                                                <p>
                                                    @if ($new)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>New Learner</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($old)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Old Learner</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($transferee)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Transferee</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Student No. / LRN:</span>
                                            </div>
                                            <div class="w-30 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $student_id }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Incoming Grade Level:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $grade_level }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">School Year:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ $sy }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2 name">
                                            <div class="w-min-content pe-0">
                                                <span class="fontsize-17-fw-500">Name:</span>
                                            </div>
                                            <div class="w-40 border-end-dark border-bottom-dark lastname">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($last_name) }}</span>
                                            </div>
                                            <div class="w-40 border-end-dark border-bottom-dark firstname">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($first_name) }}</span>
                                            </div>
                                            <div
                                                class="w-min-content  border-end-dark  border-bottom-dark middleinitial">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ Str::ucfirst(Str::of($middle_name)->substr(0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Address:</span>
                                            </div>
                                            <div class="w-80 border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500 text-center">{{ $address }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Birthplace:</span>
                                            </div>
                                            <div class="w-40 border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500">{{ Str::ucfirst($birthplace) }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Birthday:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span
                                                    class="fontsize-17-fw-500">{{ date('m/d/Y', strtotime($birthdate)) }}</span>
                                            </div>

                                        </div>
                                        <h5 class="my-2 text-start">Guardian Details:</h5>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Name:</span>
                                            </div>
                                            <div class="w-40 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_name }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Contact Details:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_contact }}</span>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Address:</span>
                                            </div>
                                            <div class="w-45 border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_address }}</span>
                                            </div>
                                            <div class="w-max-content pe-0">
                                                <span class="fontsize-17-fw-500">Email:</span>
                                            </div>
                                            <div class="w-max-content border-bottom-dark">
                                                <span class="fontsize-17-fw-500">{{ $guardian_email }}</span>
                                            </div>

                                        </div>
                                        <h5 class="my-2 text-start">Payment Method:</h5>
                                        <div class="row justify-align-center">
                                            <div class="col-3">
                                                <p>
                                                    @if ($payment_method == 1)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Annual</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($payment_method == 2)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Semi-Annual</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($payment_method == 3)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Quarterly</span>
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p>
                                                    @if ($payment_method == 4)
                                                        <span class="checkbox border-dark">&#160;<i
                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                    @else
                                                        <span
                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                    @endif
                                                    <span>Monthly</span>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="mt-2 text-start">I certify that the information above are
                                            true
                                            and
                                            correct.</h6>
                                        <div class="row mx-2 custom-border  custom-h-25">
                                            <div class="w-40 border-end-dark">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                            <div class="w-30 border-end-dark">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-end custom-date-pos">
                                                    <span class="h6">Date</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="w-40">
                                                <div class="text-center">
                                                    <span class="h6">Parent / Guardian
                                                        Signature</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-center">
                                                    <span class="h6">Admin Officer</span>
                                                </div>
                                            </div>
                                            <div class="w-30">
                                                <div class="text-center">
                                                    <span class="h6">Head Teacher</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mt-2">NOTE: Reservation fee upon enrolment is
                                            non-refundable.
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex justify-align-center" id="page-cut">
                                    <i class="fa-solid fa-scissors"></i>
                                    <div class="border-dashed w-100 h-0"></div>
                                </div>
                            @endforeach
                        </div>
                    </main>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body py-5">
                    <div class="success-checkmark">
                        <div class="check-icon">
                            <span class="icon-line line-tip"></span>
                            <span class="icon-line line-long"></span>
                            <div class="icon-circle"></div>
                            <div class="icon-fix"></div>
                        </div>
                    </div>
                    <center>
                        <h4 class="card-title">Thank you for enrolling!</h4>
                        @if ($new || $transferee)
                            <p class="card-text">Please proceed to your email and download the enrollment form
                                before going back..</p>
                        @else
                            <p class="card-text">Please download the enrollment form
                                before going back..</p>
                        @endif
                        <div class="col-sm-2 col-md-5 col-lg-3">
                            <center class="d-flex flex-column">
                                @if ($new || $transferee)
                                    <a href="https://gmail.com/"
                                        class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom mb-1"
                                        target="__blank"><i class="fa-solid fa-envelope"></i> Google Mail</a>
                                @endif
                                <a href="{{ route('home.index') }}"
                                    class="btn btn-bca-outline  text-bca hvr-sweep-to-bottom mb-1 {{ $dowloadForms == 'true' ? '' : 'd-none' }} wire:loading.attr="
                                    disabled""><i class="fa-solid fa-house"></i>
                                    Home</a>
                                <button
                                    class="btn btn-bca-outline text-bca hvr-sweep-to-bottom {{ $dowloadForms == 'true' ? 'd-none' : '' }}"
                                    type="button" id="rep" value="Print" wire:click="downloadEForm()"
                                    wire:loading.attr="disabled"><i class="fa-solid fa-download"></i> Download
                                    Enrollment Form</button>
                            </center>
                        </div>
                    </center>
                </div>
            </div>
        @endif

    @endif
    @if ($currentStep == 1)
        <div class="step-one">
            <div class="card">
                <div class="card-body py-5">
                    <h4 class="text-center"><i class="fa-solid fa-arrow-down"></i>
                        <span> Please click or tap your destination.</span>
                    </h4>
                    <div class="col-sm-2 col-md-5 col-lg-3">
                        <center class="d-flex flex-column mt-3">
                            <hr class="mt-0">
                            <button type="button" wire:loading.attr="disabled" wire:click="newStudent()"
                                class="btn btn-bca mb-2 ">New
                                Student</button>
                            <button type="button" wire:loading.attr="disabled" wire:click="transfereeStudent()"
                                class="btn btn-bca mb-2 ">Transferee</button>
                            <a href="{{ route('student.portal') }}" wire:loading.attr="disabled"
                                class="btn btn-bca mb-2 ">Old
                                Student</a>
                            <hr>

                            <a href="{{ route('home.index') }}" wire:loading.attr="disabled"
                                wire:click="clearForm()" class="btn btn-bca"><i class="fa-solid fa-house"></i>
                                Home</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($new || $transferee)
        <form wire:submit.prevent="registerNewStudent">
            {{-- STEP 1 --}}
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="card">
                        <div
                            class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                            <div class="text-left border rounded p-2">1/5</div>
                            <div class="w-100">
                                <span class="d-flex justify-content-center ">Student’s Information </span>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <div class="row">
                                <div class="col-md-9 col-lg-6 mb-3">
                                    <label for="student_lrn" class="text-dark h5 font-weight-bold">Learner Reference
                                        Number(LRN)@if ($grade_level_id >= 4)
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input class="form-control @error('student_lrn') is-invalid @enderror"
                                        type="text" name="student_lrn" id="student_lrn"
                                        placeholder="Ex. 123456789101" wire:model="student_lrn" maxlength="12">
                                    @error('student_lrn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="first_name" class="text-dark h5 font-weight-bold">First name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('first_name') is-invalid @enderror"
                                        type="text" name="first_name" id="first_name" placeholder="Ex. Juan"
                                        wire:model="first_name">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="middle_name" class="text-dark h5 font-weight-bold">Middle name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('middle_name') is-invalid @enderror"
                                        type="text" name="middle_name" id="middle_name" placeholder="Ex. Santos"
                                        wire:model="middle_name">
                                    @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="last_name" class="text-dark h5 font-weight-bold">Last name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('last_name') is-invalid @enderror"
                                        type="text" name="last_name" id="last_name" placeholder="Ex. Dela Cruz"
                                        wire:model="last_name">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3 me-lg-2">
                                    <label for="ext_name" class="text-dark h5 font-weight-bold">Ext. name</label>
                                    <input class="form-control @error('ext_name') is-invalid @enderror" type="text"
                                        name="ext_name" id="ext_name" placeholder="Ex. Jr." wire:model="ext_name">
                                    @error('ext_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-lg-3 mb-3 me-lg-2">
                                    <label for="Male" class="text-dark h5 font-weight-bold">Gender <span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <label for="male"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" class="" name="gender" id="male"
                                                value="Male" wire:model="gender">
                                            Male</label>
                                        <label for="female"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" class="" name="gender" id="female"
                                                value="Female" wire:model="gender">
                                            Female</label>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-3 me-lg-2">
                                    <label for="birthdate" class="text-dark h5 font-weight-bold">Birthdate <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('birthdate') is-invalid @enderror"
                                        type="date" name="birthdate" id="birthdate" placeholder="birthdate"
                                        wire:model="birthdate">
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="email" class="text-dark h5 font-weight-bold">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" id="email" placeholder="Ex. student@email.com"
                                        wire:model="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="birthplace" class="text-dark h5 font-weight-bold">Birthplace <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('birthplace') is-invalid @enderror"
                                        type="text" name="birthplace" id="birthplace"
                                        placeholder="Ex. Quezon City" wire:model="birthplace">
                                    @error('birthplace')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="address" class="text-dark h5 font-weight-bold">Address <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text"
                                        name="address" id="address" placeholder="Ex. Brgy Lamot 2, Quezon City"
                                        wire:model="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-lg-5">
                                    <label for="grade_level_id " class="text-dark h5 font-weight-bold">Grade Level
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="grade_level_id" id="grade_level_id "
                                        class="form-control @error('grade_level_id') is-invalid @enderror"
                                        wire:model="grade_level_id" required>
                                        <option selected class="text-center">--- Select grade level ---
                                        </option>
                                        @foreach ($gradelevels as $gradelevel)
                                            <option value="{{ $gradelevel->id }}" class="text-center">
                                                {{ $gradelevel->grade_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('grade_level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- STEP 2 --}}
            @if ($currentStep == 3)
                <div class="step-three">
                    <div class="card">
                        <div
                            class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                            <div class="text-left border rounded p-2">2/5</div>
                            <div class="w-100">
                                <span class="d-flex justify-content-center ">Parent’s Information </span>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="father_name" class="text-dark h5 font-weight-bold">Father Full
                                        name <span class="text-danger">*</span></label>
                                    <input class="form-control @error('father_name') is-invalid @enderror"
                                        type="text" name="father_name" id="father_name"
                                        placeholder="Ex. Juan G. Dela Cruz Sr." wire:model="father_name">
                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4 me-lg-2 mb-3">
                                    <label for="father_birthdate" class="text-dark h5 font-weight-bold">Birthdate
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control @error('father_birthdate') is-invalid @enderror"
                                        type="date" name="father_birthdate" id="father_birthdate"
                                        wire:model="father_birthdate">
                                    @error('father_birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="form-text text-muted">Fill up your preferred contact
                                method.
                            </p>
                            <div class="row mb-3">
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="father_email" class="text-dark h5 font-weight-bold">Email</label>
                                    <input class="form-control @error('father_email') is-invalid @enderror"
                                        type="text" name="father_email" id="father_email"
                                        placeholder="Ex. jCruz@gmail.com" wire:model="father_email">
                                    @error('father_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-9 col-lg-5 me-lg-2 ">
                                    <label for="father_landline"
                                        class="text-dark h5 font-weight-bold">Landline</label>
                                    <input class="form-control @error('father_landline') is-invalid @enderror"
                                        type="text" name="father_landline" id="father_landline"
                                        wire:model="father_landline">
                                    @error('father_landline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 ">
                                    <label for="father_contact_no" class="text-dark h5 font-weight-bold">Contact
                                        no. <span class="text-danger">*</span></label>
                                    <input class="form-control @error('father_contact_no') is-invalid @enderror"
                                        type="text" name="father_contact_no" id="father_contact_no"
                                        wire:model="father_contact_no" maxlength="11">
                                    @error('father_contact_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="father_occupation" class="text-dark h5 font-weight-bold">Occupation
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control @error('father_occupation') is-invalid @enderror"
                                        type="text" name="father_occupation" id="father_occupation"
                                        wire:model="father_occupation">
                                    @error('father_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="father_office_address" class="text-dark h5 font-weight-bold">Office
                                        address</label>
                                    <input class="form-control @error('father_office_address') is-invalid @enderror"
                                        type="text" name="father_office_address" id="father_office_address"
                                        wire:model="father_office_address">
                                    @error('father_office_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="father_office_contact" class="text-dark h5 font-weight-bold">Office
                                        Contact
                                        no.</label>
                                    <input class="form-control @error('father_office_contact') is-invalid @enderror"
                                        type="text" name="father_office_contact" id="father_office_contact"
                                        wire:model="father_office_contact">
                                    @error('father_office_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr class="shadow">
                            <div class="row">
                                <div class="col-md-9 col-lg-5 mb-3 me-lg-2">
                                    <label for="mother_name" class="text-dark h5 font-weight-bold">Mother Full
                                        name <span class="text-danger">*</span></label>
                                    <input class="form-control @error('mother_name') is-invalid @enderror"
                                        type="text" name="mother_name" id="mother_name"
                                        placeholder="Ex. Juan G. Dela Cruz" wire:model="mother_name">
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4 me-lg-2 mb-3">
                                    <label for="mother_birthdate" class="text-dark h5 font-weight-bold">Birthdate
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control @error('mother_birthdate') is-invalid @enderror"
                                        type="date" name="mother_birthdate" id="mother_birthdate"
                                        wire:model="mother_birthdate">
                                    @error('mother_birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="form-text text-muted">Fill up your preferred contact
                                method.
                            </p>
                            <div class="row mb-3">
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_email" class="text-dark h5 font-weight-bold">Email</label>
                                    <input class="form-control @error('mother_email') is-invalid @enderror"
                                        type="text" name="mother_email" id="mother_email"
                                        wire:model="mother_email">
                                    @error('mother_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_landline"
                                        class="text-dark h5 font-weight-bold">Landline</label>
                                    <input class="form-control @error('mother_landline') is-invalid @enderror"
                                        type="text" name="mother_landline" id="mother_landline"
                                        wire:model="mother_landline">
                                    @error('mother_landline')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_contact_no" class="text-dark h5 font-weight-bold">Contact
                                        no. <span class="text-danger">*</span></label>
                                    <input class="form-control @error('mother_contact_no') is-invalid @enderror"
                                        type="text" name="mother_contact_no" id="mother_contact_no"
                                        wire:model="mother_contact_no" maxlength="11">
                                    @error('mother_contact_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_occupation" class="text-dark h5 font-weight-bold">Occupation
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control @error('mother_occupation') is-invalid @enderror"
                                        type="text" name="mother_occupation" id="mother_occupation"
                                        wire:model="mother_occupation">
                                    @error('mother_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_office_address" class="text-dark h5 font-weight-bold">Office
                                        address</label>
                                    <input class="form-control @error('mother_office_address') is-invalid @enderror"
                                        type="text" name="mother_office_address" id="mother_office_address"
                                        wire:model="mother_office_address">
                                    @error('mother_office_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-9 col-lg-5 me-lg-2 mb-3">
                                    <label for="mother_office_contact" class="text-dark h5 font-weight-bold">Office
                                        Contact
                                        no.</label>
                                    <input class="form-control @error('mother_office_contact') is-invalid @enderror"
                                        type="text" name="mother_office_contact" id="mother_office_contact"
                                        wire:model="mother_office_contact">
                                    @error('mother_office_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- STEP 3 --}}
            @if ($currentStep == 4)
                <div class="step-four">
                    <div class="card">
                        <div
                            class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                            <div class="text-left border rounded p-2">3/5</div>
                            <div class="w-100">
                                <span class="d-flex justify-content-center ">Guardian Information </span>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <div class="row">
                                <div class="col-md-5 me-lg-2 mb-3">
                                    <label for="guardian_name" class="text-dark h5 font-weight-bold">Full name
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control @error('guardian_name') is-invalid @enderror"
                                        type="text" name="guardian_name" id="guardian_name"
                                        placeholder="Ex. Maria S. Dela Cruz" wire:model="guardian_name">
                                    @error('guardian_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 me-lg-2 mb-3">
                                    <label for="guardian_contact" class="text-dark h5 font-weight-bold">Contact No.
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control @error('guardian_contact') is-invalid @enderror"
                                        type="text" name="guardian_contact" id="guardian_contact"
                                        wire:model="guardian_contact">
                                    @error('guardian_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-5 me-lg-2 mb-3">
                                    <label for="guardian_email" class="text-dark h5 font-weight-bold">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('guardian_email') is-invalid @enderror"
                                        type="text" name="guardian_email" id="guardian_email"
                                        wire:model="guardian_email">
                                    @error('guardian_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7 me-lg-2 mb-3">
                                    <label for="guardian_address" class="text-dark h5 font-weight-bold">Address <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control @error('guardian_address') is-invalid @enderror"
                                        type="text" name="guardian_address" id="guardian_address"
                                        wire:model="guardian_address">
                                    @error('guardian_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 me-lg-2 mb-3">
                                    <label for="guardian_relationship"
                                        class="text-dark h5 font-weight-bold">Relationship
                                        to learner <span class="text-danger">*</span></label>
                                    <input class="form-control @error('guardian_relationship') is-invalid @enderror"
                                        type="text" name="guardian_relationship" id="guardian_relationship"
                                        wire:model="guardian_relationship">
                                    @error('guardian_relationship')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- STEP 4 --}}
            @if ($currentStep == 5)
                <div class="step-five">
                    <div class="card">
                        <div
                            class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                            <div class="text-left border rounded p-2">4/5</div>
                            <div class="w-100">
                                <span class="d-flex justify-content-center ">Requirements</span>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <div class="row">
                                <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                    <label for="psa" class="text-dark h5 font-weight-bold">Birth Certificate
                                        @if ($transferee || $new)
                                            @if ($promissory_note == 0)
                                                <span class="text-danger">*</span>
                                            @endif
                                        @endif
                                    </label>
                                    <input type="file" id="psa" name="psa" wire:model="psa"
                                        class="form-control @error('psa') is-invalid @enderror" id="psa">

                                    @error('psa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if ($transferee)
                                <div class="row">
                                    <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                        <label for="form_137" class="text-dark h5 font-weight-bold">Form 138 (previous
                                            school)<span class="text-danger">*</span>
                                        </label>
                                        <input type="file" id="form_137" name="form_137" wire:model="form_137"
                                            class="form-control @error('form_137') is-invalid @enderror"
                                            id="form_137">

                                        @error('form_137')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                        <label for="good_moral" class="text-dark h5 font-weight-bold">Good Moral
                                            Certification <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" id="good_moral" name="good_moral"
                                            wire:model="good_moral"
                                            class="form-control @error('good_moral') is-invalid @enderror"
                                            id="good_moral">

                                        @error('good_moral')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                    <label for="photo" class="text-dark h5 font-weight-bold">1x1 Photo ID
                                        @if ($transferee || $new)
                                            @if ($promissory_note == 0)
                                                <span class="text-danger">*</span>
                                            @endif
                                        @endif
                                    </label>
                                    <input type="file" id="photo" name="photo" wire:model="photo"
                                        class="form-control @error('photo') is-invalid @enderror" id="photo">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label for="promissory_note" class="gender text-dark h6 font-weight-bold"><input
                                        type="checkbox" name="promissory_note" id="promissory_note"
                                        wire:model="promissory_note" value="1"
                                        {{ $promissory_note == 1 ? 'checked' : '' }}> If your requirements are not
                                    complete, please check this agreement.</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- STEP 5 --}}
            @if ($currentStep == 6)
                <div class="step-six">
                    <div class="card">
                        <div
                            class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                            <div class="text-left border rounded p-2">5/5</div>
                            <div class="w-100">
                                <span class="d-flex justify-content-center ">Payment</span>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <div class="row">
                                <div class="col-md-6 col-lg-8 me-lg-2 mb-3">
                                    <label for="conPayment" class="text-dark h5 font-weight-bold">Your most
                                        convenient
                                        way
                                        of
                                        payment? <span class="text-danger">*</span></label>
                                    <div class="ms-2">
                                        <div class="form-check">
                                            <input class="form-check-input @error('conPayment') is-invalid @enderror"
                                                name="conPayment" type="radio" value="Bank Deposit"
                                                id="bank_deposit" wire:model="conPayment">
                                            <label class="form-check-label  gender" for="bank_deposit">
                                                Bank Deposit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('conPayment') is-invalid @enderror"
                                                name="conPayment" type="radio" value="Cash" id="cash"
                                                wire:model="conPayment">
                                            <label class="form-check-label gender" for="cash">
                                                Cash
                                            </label>
                                            @error('conPayment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($conPayment == 'Cash')
                                    <div class="col-md-5 me-lg-2 mb-3">
                                        <h5 class="card-title font-weight-bold">School:</h5>
                                        <span class="card-text">9006 Eagle Street Main Road, Area 3 SItio Veterans, Bagong SIlangan 1100 Quezon City, Philippines</span>
                                    </div>
                                @elseif ($conPayment == 'Bank Deposit')
                                    <div class="col-md-5 me-lg-2 mb-3">
                                        <h5 class="card-title font-weight-bold">School:</h5>
                                        <span class="card-text"></span>
                                    </div>
                                @endif --}}
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                    <label for="payment_method" class="text-dark h5 font-weight-bold">Payment
                                        Method <span class="text-danger">*</span>
                                    </label>
                                    <div class="ms-2">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_method') is-invalid @enderror"
                                                name="payment_method" type="radio" value="1"
                                                id="annual_payment" wire:model="payment_method">
                                            <label class="form-check-label  gender" for="annual_payment">
                                                Annual
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_method') is-invalid @enderror"
                                                name="payment_method" type="radio" value="2"
                                                id="semiannual_payment" wire:model="payment_method">
                                            <label class="form-check-label  gender" for="semiannual_payment">
                                                Semi-Annual
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_method') is-invalid @enderror"
                                                name="payment_method" type="radio" value="3" id="quarterly"
                                                wire:model="payment_method">
                                            <label class="form-check-label gender" for="quarterly">
                                                Quarterly
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('payment_method') is-invalid @enderror"
                                                name="payment_method" type="radio" value="4" id="monthly"
                                                wire:model="payment_method">
                                            <label class="form-check-label gender" for="monthly">
                                                Monthly
                                            </label>
                                            @error('payment_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($conPayment == 'Cash')
                                <div class="row">

                                    <div class="col-md-10 me-lg-2 mb-3">
                                        <h5 class="card-title font-weight-bold">School Location:</h5>
                                        <span class="card-text">9006 Eagle Street Main Road, Area 3 SItio Veterans,
                                            Bagong SIlangan 1100 Quezon City, Philippines</span>
                                    </div>
                                </div>
                            @elseif ($conPayment == 'Bank Deposit')
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 me-lg-2 mb-3">
                                        <label for="payment_proof" class="text-dark h5 font-weight-bold">Proof of
                                            Payment <span class="text-danger">*</span></label>
                                        <input type="file" id="payment_proof" name="payment_proof"
                                            wire:model="payment_proof"
                                            class="form-control @error('payment_proof') is-invalid @enderror"
                                            id="payment_proof">
                                        @error('payment_proof')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5 me-lg-2 mb-3">
                                        <h5 class="card-title font-weight-bold">Bank No.:</h5>
                                        <span class="card-text">123-1241-24123</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            @if ($currentStep !== 0 && $currentStep !== 1)
                <div class="action-buttons d-flex justify-content-between align-items-center bg-white pt-2 pb-2 px-3">
                    @if ($currentStep == 2)
                        <div></div>
                    @endif

                    @if ($currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6)
                        <button type="button" class="btn btn-md btn-secondary" wire:loading.attr="disabled"
                            wire:click="decreaseStep()">Back</button>
                    @endif
                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                        <div wire:loading.delay class="bg-transparent">
                            <img src="{{ asset('assets/img/icons8-loading-circle.gif') }}" width="20" height="20"
                                class="m-auto mt-1/4">
                        </div>
                    @endif
                    @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                        <button type="button" wire:loading.attr="disabled" class="btn btn-md btn-bca"
                            wire:click="increaseStep()">Next</button>
                    @endif

                    @if ($currentStep == 6)
                        <button type="submit" wire:submit class="btn btn-md btn-primary d-flex align-items-center">
                            <div wire:loading.delay.long wire:target="registerNewStudent" class="bg-transparent">
                                <img src="{{ asset('assets/img/icons8-loading-circle.gif') }}" width="20"
                                    height="20" class="">
                            </div> Submit
                        </button>
                        <div wire:offline>
                            You are now offline.
                        </div>
                    @endif
                </div>
            @endif
        </form>
    @endif
</div>
@push('scripts')
    <script type="text/javascript">
        function donwload() {
            var element = document.getElementById('donwload-content');
            var element2 = document.getElementById('donwload-content2');
            var opt = {
                margin: .3,
                filename: 'Student E-Form.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {},
                jsPDF: {
                    unit: 'in',
                    orientation: 'portrait',
                },
                pagebreak: {
                    mode: 'avoid-all',
                    after: '#page-cut'
                }
            };
            var opt2 = {
                margin: .3,
                filename: 'Student E-Payament.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {},
                jsPDF: {
                    unit: 'in',
                    orientation: 'portrait',
                },
                pagebreak: {
                    mode: 'avoid-all',
                    after: '#page-cut'
                }
            };
            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();
            html2pdf().set(opt2).from(element2).save();
            /*    setTimeout(() => {
               }, 1000); */
        }
    </script>
@endpush
