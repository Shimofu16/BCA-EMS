<div>
    @if ($isEnrollment)
        <div class="pb-4">
            @if ($student->isDone == 0)
                @if ($currentStep == 0)
                    <div class=" py-5">
                        @if ($downloadFiles)
                            <div class="bg-white text-darkc">
                                <div class="py-3 d-flex justify-content-center">
                                    <button class="btn btn-bca-outline text-bca hvr-sweep-to-bottom" type="button"
                                        id="rep" wire:loading.attr="disabled" value="Print" onclick="donwload()"
                                        wire:click="download()"><i class="fa-solid fa-download"></i>
                                        Download</button>
                                    <button class="btn btn-bca-outline text-bca hvr-sweep-to-bottom ml-2"
                                        wire:loading.attr="disabled" type="button" wire:click="downloadEForm"><i
                                            class="fa-solid fa-arrow-circle-left"></i>
                                        Back</button>
                                </div>
                                <hr>
                                <div class="mb-5 mt-3 d-flex justify-align-center">
                                    <main class="px-5">
                                        <div class="mb-5">
                                            <div id="donwload-content">
                                                @foreach ($ecopies as $item)
                                                    <div class="student-copy text-darkc">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center bg-white border-0 text-center mt-3">
                                                            <div class="left">
                                                                <img src="{{ asset('assets/img/BCA-Logo.png') }}"
                                                                    alt="BCA LOGO" class="myLogo">
                                                            </div>
                                                            <div class="text-center">
                                                                <h4 class="font-weight-bold mb-0 pt-3">BREAKTHROUGH
                                                                    CHRISTIAN ACADEMY</h4>
                                                                <p class="m-0 p-0">9006 Eagle St., Area 3, Sitio
                                                                    Veterans,
                                                                    Brgy.
                                                                    Bagong
                                                                    Silangan, Quezon
                                                                    City</p>
                                                                <p class="m-0 p-0 me-5">990 5970 </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" d-flex flex-column justify-content-center align-content-center">
                                                            <h5 class="font-weight-bold text-center text-capitalize">
                                                                ENROLMENT FORM -
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
                                                                    <span class="fontsize-17-fw-500">Student No. /
                                                                        LRN:</span>
                                                                </div>
                                                                <div class="w-30 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $preschool ? $student_id : $student_lrn }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Incoming Grade
                                                                        Level:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $grade_level }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">School
                                                                        Year:</span>
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
                                                                <div
                                                                    class="w-40 border-end-dark border-bottom-dark lastname">
                                                                    <span
                                                                        class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($last_name) }}</span>
                                                                </div>
                                                                <div
                                                                    class="w-40 border-end-dark border-bottom-dark firstname">
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
                                                            <h5 class="my-2 text-start font-weight-bold">Guardian Details:</h5>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Name:</span>
                                                                </div>
                                                                <div class="w-40 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_name }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Contact
                                                                        Details:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_contact }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Address:</span>
                                                                </div>
                                                                <div class="w-45 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_address }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Email:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_email }}</span>
                                                                </div>

                                                            </div>
                                                            <h6 class="mt-2 text-start">I certify that the
                                                                information above are
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
                                                            <h5 class="mt-2 font-weight-bold">NOTE: Reservation fee upon enrolment
                                                                is
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
                                        </div>
                                        <hr>
                                        <div class="my-5">
                                            <div id="donwload-content2">
                                                @foreach ($pcopies as $item)
                                                    <div class="student-copy">
                                                        <div
                                                            class="d-flex justify-content-center align-items-center bg-white border-0 text-center mt-3 position-relative">
                                                            <div class="left">
                                                                <img src="{{ asset('assets/img/BCA-Logo.png') }}"
                                                                    alt="BCA LOGO" class="myLogo">
                                                            </div>
                                                            <div class="text-center">
                                                                <h4 class="font-weight-bold mb-0 pt-3">BREAKTHROUGH
                                                                    CHRISTIAN ACADEMY</h4>
                                                                <p class="m-0 p-0 mb-3">9006 Eagle St., Area 3,
                                                                    Sitio Veterans,
                                                                    Brgy.
                                                                    Bagong
                                                                    Silangan, Quezon
                                                                    City</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class=" d-flex flex-column justify-content-center align-content-center">
                                                            <h5 class="font-weight-bold text-center">PAYMENT FORM -
                                                                {{ $item }}
                                                                COPY
                                                            </h5>
                                                            <div class="row justify-align-center">
                                                                <div class="col-3">
                                                                    <p>
                                                                        <span
                                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                                        <span>New Learner</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-3">
                                                                    <p>
                                                                        <span class="checkbox border-dark">&#160;<i
                                                                                class="fa-solid fa-check"></i>&#160;</span>
                                                                        <span>Old Learner</span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-3">
                                                                    <p>
                                                                        <span
                                                                            class="checkbox border-dark">&#160;&#160;&#160;&#160;&#160;</span>
                                                                        <span>Transferee</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Student No. /
                                                                        LRN:</span>
                                                                </div>
                                                                <div class="w-30 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $preschool ? $student_id : $student_lrn }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Incoming Grade
                                                                        Level:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $grade_level }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">School
                                                                        Year:</span>
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
                                                                <div
                                                                    class="w-40 border-end-dark border-bottom-dark lastname">
                                                                    <span
                                                                        class="fontsize-17-fw-500 text-center">{{ Str::ucfirst($last_name) }}</span>
                                                                </div>
                                                                <div
                                                                    class="w-40 border-end-dark border-bottom-dark firstname">
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
                                                            <h5 class="my-2 text-start font-weight-bold">Guardian Details:</h5>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Name:</span>
                                                                </div>
                                                                <div class="w-40 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_name }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Contact
                                                                        Details:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_contact }}</span>
                                                                </div>

                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Address:</span>
                                                                </div>
                                                                <div class="w-45 border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_address }}</span>
                                                                </div>
                                                                <div class="w-max-content pe-0">
                                                                    <span class="fontsize-17-fw-500">Email:</span>
                                                                </div>
                                                                <div class="w-max-content border-bottom-dark">
                                                                    <span
                                                                        class="fontsize-17-fw-500">{{ $guardian_email }}</span>
                                                                </div>

                                                            </div>
                                                            <h5 class="my-2 text-start font-weight-bold">Payment Method:</h5>
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
                                                            <h6 class="mt-2 text-start ">I certify that the
                                                                information above are
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
                                                            <h5 class="mt-2 font-weight-bold">NOTE: Reservation fee upon enrolment
                                                                is
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
                                        </div>
                                    </main>
                                </div>
                            </div>
                        @else
                            <div class="success-checkmark">
                                <div class="check-icon">
                                    <span class="icon-line line-tip"></span>
                                    <span class="icon-line line-long"></span>
                                    <div class="icon-circle"></div>
                                    <div class="icon-fix"></div>
                                </div>
                            </div>
                            <center>
                                <h4 class="card-title">Thank you for completing the enrollment process!</h4>
                                <p class="card-text">Please download the enrollment form
                                    before going back..</p>
                                <div class="col-sm-2 col-md-2">
                                    <center class="d-flex flex-column">
                                        <button class="btn btn-bca-outline text-bca hvr-sweep-to-bottom"
                                            wire:click='downloadEForm' wire:loading.attr="disabled">
                                            <i class="fa-solid fa-download"></i>
                                            Download Enrollment Form
                                        </button>
                                    </center>
                                </div>
                            </center>
                        @endif
                    </div>
                @else
                    <form wire:submit.prevent="registerOldStudent">
                        {{-- STEP 1 --}}
                        @if ($currentStep == 1)
                            <div class="step-two">
                                <div class="card">
                                    <div
                                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                                        <div class="text-left border rounded p-2">1/3</div>
                                        <div class="w-100">
                                            <span class="d-flex justify-content-center ">Student’s Information </span>
                                        </div>
                                    </div>
                                    <div class="card-body text-start">
                                        <div class="row">
                                            @if ($grade_level_id >= 4 && $student_lrn == null)
                                                <div class="col-md-4 col-lg-4 mb-3">
                                                    <label for="student_lrn"
                                                        class="text-dark h5 font-weight-bold">Learner
                                                        Reference
                                                        Number(LRN)
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input
                                                        class="form-control @error('student_lrn') is-invalid @enderror"
                                                        type="text" name="student_lrn" id="student_lrn"
                                                        placeholder="Ex. 123456789101" wire:model="student_lrn"
                                                        maxlength="12">
                                                    @error('student_lrn')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9 col-lg-5 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Name:</span>
                                                    {{ $first_name }}
                                                    {{ $middle_name }}, {{ $last_name }}
                                                    {{ $ext_name == null ? '' : $ext_name }}</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Gender:</span>
                                                    {{ $gender }}
                                                </h5>
                                            </div>
                                            <div class="col-md-3 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Age:</span>
                                                    {{ $age }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9 col-lg-5 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Email:</span>
                                                    {{ $email }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Birthdate:</span>
                                                    {{ date('m/d/Y', strtotime($birthdate)) }}</h5>
                                            </div>
                                            <div class="col-md-3 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Birthplace:</span>
                                                    {{ $birthplace }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9 col-lg-5 mb-2 me-lg-2">
                                                <h5><span class="text-dark font-weight-bold">Address:</span>
                                                    {{ $address }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9 col-lg-5 mb-2 me-lg-2">
                                                @foreach ($gradelevels as $gradelevel)
                                                    @if ($gradelevel->id == $grade_level_id)
                                                        <h5><span class="text-dark font-weight-bold">Grade
                                                                Level:</span>
                                                            {{ $gradelevel->grade_name }}</h5>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- STEP 4 --}}
                        @if ($currentStep == 2)
                            <div class="step-five">
                                <div class="card">
                                    <div
                                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                                        <div class="text-left border rounded p-2">2/3</div>
                                        <div class="w-100">
                                            <span class="d-flex justify-content-center ">Requirements</span>
                                        </div>
                                    </div>
                                    <div class="card-body text-start">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                                <label for="form_137" class="text-dark h5 font-weight-bold">Form 138
                                                    @if ($promissory_note != 1)
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </label>
                                                <input type="file" id="form_137" name="form_137"
                                                    wire:model="form_137"
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
                                            <label for="promissory_note"
                                                class="gender text-dark h6 font-weight-bold"><input type="checkbox"
                                                    name="promissory_note" id="promissory_note"
                                                    wire:model="promissory_note" value="1"
                                                    {{ $promissory_note == 1 ? 'checked' : '' }}> If your
                                                requirements
                                                are
                                                not
                                                complete, please check this agreement.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- STEP 3 --}}
                        @if ($currentStep == 3)
                            <div class="step-six">
                                <div class="card">
                                    <div
                                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                                        <div class="text-left border rounded p-2">3/3</div>
                                        <div class="w-100">
                                            <span class="d-flex justify-content-center ">Payment</span>
                                        </div>
                                    </div>
                                    <div class="card-body text-start">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-8 me-lg-2 mb-3">
                                                <label for="conPayment" class="text-dark h5 font-weight-bold">Your
                                                    most
                                                    convenient
                                                    way
                                                    of
                                                    payment? <span class="text-danger">*</span></label>
                                                <div class="ms-2">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('conPayment') is-invalid @enderror"
                                                            name="conPayment" type="radio" value="Bank Deposit"
                                                            id="bank_deposit" wire:model="conPayment">
                                                        <label class="form-check-label  gender" for="bank_deposit">
                                                            Bank Deposit
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('conPayment') is-invalid @enderror"
                                                            name="conPayment" type="radio" value="Cash"
                                                            id="cash" wire:model="conPayment">
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-7 me-lg-2 mb-3">
                                                <label for="payment_method"
                                                    class="text-dark h5 font-weight-bold">Payment
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
                                                        <label class="form-check-label  gender"
                                                            for="semiannual_payment">
                                                            Semi-Annual
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('payment_method') is-invalid @enderror"
                                                            name="payment_method" type="radio" value="3"
                                                            id="quarterly" wire:model="payment_method">
                                                        <label class="form-check-label gender" for="quarterly">
                                                            Quarterly
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('payment_method') is-invalid @enderror"
                                                            name="payment_method" type="radio" value="4"
                                                            id="monthly" wire:model="payment_method">
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
                                                    <span class="card-text">9006 Eagle Street Main Road, Area 3 SItio
                                                        Veterans,
                                                        Bagong SIlangan 1100 Quezon City, Philippines</span>
                                                </div>
                                            </div>
                                        @elseif ($conPayment == 'Bank Deposit')
                                            <div class="row">
                                                <div class="col-md-5 col-lg-5 me-lg-2 mb-3">
                                                    <label for="payment_proof"
                                                        class="text-dark h5 font-weight-bold">Proof
                                                        of
                                                        Payment <span class="text-danger">*</span></label>
                                                    <input type="file" id="payment_proof" name="payment_proof"
                                                        wire:model="payment_proof"
                                                        class="form-control @error('payment_proof') is-invalid @enderror">
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

                        <div
                            class="action-buttons d-flex justify-content-between align-items-center bg-white pt-2 pb-2 px-3 border-bottom border-left border-start">
                            @if ($currentStep == 1)
                                <div></div>
                            @endif

                            @if ($currentStep == 2 || $currentStep == 3)
                                <button type="button" class="btn btn-md btn-secondary" wire:loading.attr="disabled"
                                    wire:click="decreaseStep()">Back</button>
                            @endif
                            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                                <div wire:loading.delay class="bg-transparent">
                                    <img src="{{ asset('assets/img/icons8-loading-circle.gif') }}" width="20"
                                        height="20" class="m-auto">
                                </div>
                            @endif
                            @if ($currentStep == 1 || $currentStep == 2)
                                <button type="button" wire:loading.attr="disabled" class="btn btn-md btn-bca"
                                    wire:click="increaseStep()">Next</button>
                            @endif

                            @if ($currentStep == 3)
                                <button type="submit" wire:submit
                                    class="btn btn-md btn-primary d-flex align-items-center">
                                    <div wire:loading.delay.long wire:target="registerNewStudent"
                                        class="bg-transparent">
                                        <img src="{{ asset('assets/img/icons8-loading-circle.gif') }}"
                                            width="20" height="20" class="">
                                    </div> Submit
                                </button>
                                <div wire:offline>
                                    You are now offline.
                                </div>
                            @endif
                        </div>
                    </form>
                @endif
            @else
                <div>you`re done enrolling :)</div>
            @endif
        </div>
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
