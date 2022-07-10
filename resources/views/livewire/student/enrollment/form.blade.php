<div>
    @if ($isEnrollment)
        <div class="pb-4">
            @if ($student->isDone == 0)
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
                                                <label for="student_lrn" class="text-dark h5 font-weight-bold">Learner
                                                    Reference
                                                    Number(LRN)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input class="form-control @error('student_lrn') is-invalid @enderror"
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
                                            <h5><span class="text-dark font-weight-bold">Age:</span> {{ $age }}
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
                                                    <h5><span class="text-dark font-weight-bold">Grade Level:</span>
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
                                        <label for="promissory_note" class="gender text-dark h6 font-weight-bold"><input
                                                type="checkbox" name="promissory_note" id="promissory_note"
                                                wire:model="promissory_note" value="1"
                                                {{ $promissory_note == 1 ? 'checked' : '' }}> If your requirements
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
                                            <label for="conPayment" class="text-dark h5 font-weight-bold">Your most
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
                                                <label for="payment_proof" class="text-dark h5 font-weight-bold">Proof
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
                    @if ($currentStep == 4)
                        <div class=" py-5">
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
                                            wire:click="downloadEForm()" wire:loading.attr="disabled">
                                            <i class="fa-solid fa-download"></i>
                                            Download Enrollment Form
                                        </button>
                                    </center>
                                </div>
                            </center>
                        </div>
                    @endif
                    @if ($currentStep != 4)
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
                                        <img src="{{ asset('img/icons8-loading-circle.gif') }}" width="20"
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
            @else
                <div>you`re done enrolling :)</div>
            @endif
        </div>
    @endif
</div>
