<?php

namespace App\Http\Livewire\Enrollment;

use App\Http\Controllers\Manage\FileController;
use App\Http\Controllers\Manage\MailController;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\Family;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\VerificationCode;
use App\Models\Registrar\Student;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $student = [];
    public $families;
    public $requirements;
    public $student_payment;

    public $requiredLrn;
    public $student_lrn;
    public $student_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $ext_name;
    public $gender;
    public $age;
    public $email;
    public $birthdate;
    public $birthplace;
    public $address;
    public $grade_level_id;
    public $grade_level;
    public $sy;

    /* public $retVal = () ? a : b ; */

    public $father_name;
    public $father_birthdate;
    public $father_landline;
    public $father_email;
    public $father_contact_no;
    public $father_occupation;
    public $father_office_address = '';
    public $father_office_contact;

    public $mother_name;
    public $mother_birthdate;
    public $mother_landline;
    public $mother_email;
    public $mother_contact_no;
    public $mother_occupation;
    public $mother_office_address = '';
    public $mother_office_contact;

    public $guardian_name;
    public $guardian_contact;
    public $guardian_address;
    public $guardian_email;
    public $guardian_relationship;

    public $psa = '';
    public $form_137 = '';
    public $good_moral = '';
    public $photo = '';
    public $promissory_note = 0;

    public $bank = false;
    public $cash = false;
    public $payment_method;
    public $conPayment;
    public $nursery = 24500, $kinder = 24500, $prep = 24500;
    public $g1 = 24500, $g2 = 24500, $g3 = 24500, $g4 = 24500, $g5 = 24500, $g6 = 24500, $g7 = 24500, $g8 = 24500, $g9 = 24500, $g10 = 24500;
    public $total, $annual, $semi, $quarter, $monthly;
    public $payment;
    public $payment_proof;

    public $preschool = false, $elem = false, $jhs = false;
    public $downloadFiles = false;
    public $dowloadForms  = false;
    public $ecopies = ['STUDENT', 'HEAD TEACHER', 'ADMIN'];
    public $pcopies = ['STUDENT', 'ADMIN'];

    public $totalSteps = 6;
    public $currentStep = 1;

    public $new = false;
    public $transferee = false;
    public $old = false;
    public $resend = false;
    protected  $validationAttributes  = [
        'student_lrn' => 'Learner Reference Number (LRN)',
        'first_name' => 'First Name',
        'middle_name' => 'Middle Name',
        'last_name' => 'Last Name',
        'gender' => 'Gender',
        'age' => 'Age',
        'email' => 'Email Address',
        'birthdate' => 'Birthdate',
        'address' => 'Address',
        'grade_level_id ' => 'Grade Level',

        'father_name' => 'Father Full Name',
        'father_birthdate' => 'Father Birthdate',
        'father_contact_no' => 'Father Contact Number',
        'father_occupation' => 'Father Occupation',
        /* mother */
        'mother_name' => 'Mother Full Name',
        'mother_birthdate' => 'Mother Birthdate',
        'mother_contact_no' => 'Mother Contact Number',
        'mother_occupation' => 'Mother Occupation',
        /* guardian */
        'guardian_name' => 'Guardian Name',
        'guardian_contact' => 'Guardian Contact',
        'guardian_relationship' => 'Guardian Relationship',

        'psa' => 'Philippine Statistics Authority',
        'form_137' => 'Form 137',
        'good_moral' => 'Good Moral Certification',
        'photo' => '1x1 Photo',

        'conPayment' => 'Convinient way of Payment',
        'payment_method' => 'Payment Method',
        'payment' => 'Payment',
        'payment_proof' => 'Proof of Payment',

    ];
    public function mount()
    {
        $this->currentStep = 1;
    }

    public function increaseStep()
    {
        $this->validateData();
        $this->resetErrorBag();
        if ($this->currentStep == 1) {
            sleep(.5);
        }
        sleep(1);
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        sleep(1);
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {
        if ($this->currentStep == 2) {
            $this->validate([
                'student_lrn' => ($this->grade_level_id > 3) ? 'required|alpha_num|max:12|min:12|unique:students,student_lrn' : '',
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'email' => 'required|unique:students,email',
                'birthdate' => 'required',
                'birthplace' => 'required|string',
                'address' => 'required|string',
                'grade_level_id' => 'required|numeric',
            ]);
        }
        if ($this->currentStep == 3) {
            $this->validate([
                'father_name' => 'required|string',
                'father_birthdate' => 'required',
                'father_contact_no' => 'required|numeric|digits:11',
                'father_occupation' => 'required',

                'mother_name' => 'required|string',
                'mother_birthdate' => 'required',
                'mother_contact_no' =>  'required|numeric|digits:11',
                'mother_occupation' => 'required',

            ]);
        }
        if ($this->currentStep == 4) {
            $this->validate([
                'guardian_name' => 'required|string',
                'guardian_contact' =>  'required|numeric|digits:11',
                'guardian_address' => 'required',
                'guardian_email' => 'required',
                'guardian_relationship' => 'required',
            ]);
        }
        if ($this->currentStep == 5) {
            if ($this->promissory_note == 1) {
                if ($this->transferee == 1) {
                    $this->validate([
                        'psa' => 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'form_137' => (($this->form_137 == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'good_moral' => (($this->good_moral == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                } else {
                    $this->validate([
                        'psa' => 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                }
            } else {
                if ($this->transferee == 1) {
                    $this->validate([
                        'psa' => (($this->psa == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'form_137' => (($this->form_137 == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'good_moral' => (($this->good_moral == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                } else {
                    $this->validate([
                        'psa' => (($this->psa == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                }
            }
        }
        if ($this->currentStep == 6) {
            $this->validate([
                'conPayment' => 'required',
                'payment_method' =>  'required',
                /* 'payment' => (($this->conPayment == 'Cash') ? 'required|'  : '') . 'numeric|digits_between:4,5', */
                'payment_proof' => (($this->conPayment == 'Bank Deposit') ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
            ]);
        }
    }

    public function updated($propertyName)
    {

        if ($this->currentStep == 2) {
            $this->validateOnly($propertyName, [
                'student_lrn' => 'alpha_num|max:12|min:12|unique:students,student_lrn',
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'email' => 'required|unique:students,email',
                'birthdate' => 'required',
                'birthplace' => 'required|string',
                'address' => 'required|string',
                'grade_level_id' => 'required|numeric',
            ]);
        }
        if ($this->currentStep == 3) {
            $this->validateOnly($propertyName, [
                'father_name' => 'required|string',
                'father_birthdate' => 'required',
                'father_contact_no' => 'required|numeric|digits:11',
                'father_occupation' => 'required',
                'father_office_address' => 'string',
                'father_office_contact' => 'numeric',

                'mother_name' => 'required|string',
                'mother_birthdate' => 'required',
                'mother_contact_no' =>  'required|numeric|digits:11',
                'mother_occupation' => 'required',
                'mother_office_address' => 'string',
                'mother_office_contact' => 'numeric',

            ]);
        }
        if ($this->currentStep == 4) {
            $this->validateOnly($propertyName, [
                'guardian_name' => 'required|string',
                'guardian_contact' =>  'required|numeric|digits:11',
                'guardian_address' => 'required',
                'guardian_email' => 'required',
                'guardian_relationship' => 'required',
            ]);
        }
        if ($this->currentStep == 5) {
            if ($this->promissory_note == 1) {
                if ($this->transferee == 1) {
                    $this->validateOnly($propertyName, [
                        'psa' => 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'form_137' => (($this->form_137 == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'good_moral' => (($this->good_moral == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                } else {
                    $this->validateOnly($propertyName, [
                        'psa' =>  'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                }
            } else {
                if ($this->transferee == 1) {
                    $this->validateOnly($propertyName, [
                        'psa' => (($this->psa == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'form_137' => (($this->form_137 == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'good_moral' => (($this->good_moral == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                } else {
                    $this->validateOnly($propertyName, [
                        'psa' => (($this->psa == null) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                        'photo' => (($this->photo == null) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                    ]);
                }
            }
        }
        if ($this->currentStep == 6) {
            $this->validateOnly($propertyName, [
                'conPayment' => 'required',
                'payment_method' =>  'required',
                /* 'payment' => (($this->conPayment == 'Cash') ? 'required|'  : '') . 'numeric|digits_between:4,5', */
                'payment_proof' => (($this->conPayment == 'Bank Deposit') ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
            ]);
        }
    }
    public function downloadEForm()
    {
        
    }
    public function clearForm()
    {
        $this->reset();
    }
    public function download()
    {
        $this->dowloadForms  = true;
    }

    public function newStudent()
    {
        $this->new = true;

        $this->currentStep++;
    }
    public function transfereeStudent()
    {
        $this->transferee = true;
        $this->currentStep++;
    }
    public function registerNewStudent()
    {
        $this->validateData();
        $this->resetErrorBag();
        $student_count = Student::count();
        $this->student_id =  Carbon::now()->format('Y') . "-" . str_pad($student_count, 5, '0', STR_PAD_LEFT) . "-CL-0";
        $variable = Student::all();
        foreach ($variable as $item) {
            if ($item->student_id == $this->student_id) {
                $this->student_id =  Carbon::now()->format('Y') . "-" . str_pad($student_count + 1, 5, '0', STR_PAD_LEFT) . "-CL-0";
            }
        }
        $age = Carbon::parse($this->birthdate)->diff(Carbon::now());
        $name = Str::ucfirst($this->first_name) . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . ' ' . Str::ucfirst($this->last_name);

        $pn = 0;
        if ($this->new) {
            $student_type = 'New Student';
            $pn = ($this->psa == null && $this->form_137 == null && $this->good_moral == null && $this->photo == null) ?  1 : 0;
            if ($this->promissory_note == 1) {
                $pn = ($this->psa == null && $this->photo == null) ?  1 : 0;
            }
        }
        if ($this->old) {
            $student_type = 'Old Student';
        }
        if ($this->transferee) {
            $student_type = 'Transferee';
            $pn = ($this->psa == null && $this->form_137 == null && $this->good_moral == null && $this->photo == null) ?  1 : 0;
            if ($this->promissory_note == 1) {
                $pn = ($this->psa == null && $this->photo == null) ?  1 : 0;
            }
        }
        $families = [
            [
                'student_id' => $this->student_id,
                'name' => $this->father_name,
                'birthdate' => $this->father_birthdate,
                'email' => $this->father_email,
                'landline' => $this->father_landline,
                'contact_no' => $this->father_contact_no,
                'occupation' => $this->father_occupation,
                'office_address' => $this->father_office_address,
                'office_contact_no' => $this->father_office_contact,
                'relationship' => 'Father',
                'relationship_type' => 'father',
            ], [
                'student_id' => $this->student_id,
                'name' => $this->mother_name,
                'birthdate' => $this->mother_birthdate,
                'email' => $this->mother_email,
                'landline' => $this->mother_landline,
                'contact_no' => $this->mother_contact_no,
                'occupation' => $this->mother_occupation,
                'office_address' => $this->mother_office_address,
                'office_contact_no' => $this->mother_office_contact,
                'relationship' => 'Mother',
                'relationship_type' => 'mother',
            ], [
                'student_id' => $this->student_id,
                'name' => $this->guardian_name,
                'contact_no' => $this->guardian_contact,
                'address' => $this->guardian_address,
                'email' => $this->guardian_email,
                'relationship' => $this->guardian_relationship,
                'relationship_type' => 'guardian',
            ]
        ];
        /* declare all payment variavles here */
        $student_id = $this->student_id;
        $path = 'uploads/requirements/' . $name;
        $balance = 20000;
        $payment_method = '';
        switch ($this->payment_method) {
            case 1:
                $payment_reminder = now()->addYear(1);
                $payment_method = 'Annual';
                break;
            case 2:
                $payment_reminder = now()->addMonth(6);
                $payment_method = 'Semi-Annual';
                break;
            case 3:
                $payment_reminder = now()->addMonth(3);
                $payment_method = 'Quarterly';
                break;
            case 4:
                $payment_reminder = now()->addMonth(1);
                $payment_method = 'Monthly';
                break;
        }

        $code = sha1(time() . $student_id);
        $recipient = $this->email;
        $sy = SchoolYear::where('isCurrent', '=', 1)->first();

        try {
            VerificationCode::create([
                'student_id' => $this->student_id,
                'verification_code' => $code,
                'date_sent' => now()->toDateString(),
                'expiration_date' => now()->addDay(3),
            ]);
            MailController::sendVerificationCodeMail($this->first_name, $recipient, $code);
            foreach ($families as $family) {
                Family::create($family);
            }
            FileController::requirements($path, $student_id, $this->psa, $this->form_137, $this->good_moral, $this->photo);
            $studentID = Student::create([
                'student_id' => $this->student_id,
                'student_lrn' => ($this->student_lrn == "") ? null : $this->student_lrn,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'ext_name' => $this->ext_name,
                'gender' => $this->gender,
                'age' =>  $age->y,
                'email' => $this->email,
                'birthdate' => $this->birthdate,
                'birthplace' => $this->birthplace,
                'address' => $this->address,
                'grade_level_id' => $this->grade_level_id,
                'student_type' => $student_type,
                'hasPromissoryNote' => $pn,
                'enrollment_sy' => $sy->school_year,
                'sy_id' => $sy->id,
                'isDone' => 1,
                'created_at' => now(),
            ])->id;
            $payment = Payment::create([
                'student_id' => $studentID,
                'balance' => $balance,
                'reminder_at' => $payment_reminder,
            ])->id;
            $payment_log = PaymentLog::create([
                'payment_id' => $payment,
                'sy_id' => $sy->id,
                'grade_level_id' => $this->grade_level_id,
                'mop' => $this->conPayment,
                'payment_method' => $payment_method,
                'amount' => ($this->payment != null) ? $this->payment :  0,
            ]);
            if ($this->payment_proof != null) {
                FileController::pop($path, $payment, $this->payment_proof,$sy->school_year);
            }

            $this->currentStep = 0;
        } catch (\Throwable $th) {
            dd($th->getMessage(), 'Error T_T');
            return back();
        }
    }
    public function render()
    {
        return view('livewire.enrollment.form', ['gradelevels' => GradeLevel::all()]);
    }
}
