<?php

namespace App\Http\Livewire\Student\Enrollment;

use App\Http\Controllers\Manage\FileController;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $isEnrollment;
    public $student;
    public $father;
    public $mother;
    public $guardian;
    public $requirements;
    public $student_payment;

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

    public $bank_deposit = false;
    public $cash = false;
    public $payment_method;
    public $conPayment;
    public $payment;
    public $payment_proof;

    public $preschool = false, $elem = false, $jhs = false;
    public $downloadFiles = false;
    public $dowloadForms  = false;
    public $ecopies = ['STUDENT', 'HEAD TEACHER', 'ADMIN'];
    public $pcopies = ['STUDENT', 'ADMIN'];

    public $totalSteps = 4;
    public $currentStep = 1;

    public $old = true;
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
        $this->student_lrn = ($this->student->student_lrn == null) ? null : $this->student->student_lrn;
        $this->first_name = ($this->student->first_name == null) ? null : $this->student->first_name;
        $this->middle_name = ($this->student->middle_name == null) ? null : $this->student->middle_name;
        $this->last_name = ($this->student->last_name == null) ? null : $this->student->last_name;
        $this->ext_name = ($this->student->ext_name == null) ? null : $this->student->ext_name;
        $this->gender = ($this->student->gender == null) ? null : $this->student->gender;
        $this->age = ($this->student->age == null) ? null : $this->student->age;
        $this->email = ($this->student->email == null) ? null : $this->student->email;
        $this->birthdate = ($this->student->birthdate == null) ? null : $this->student->birthdate;
        $this->birthplace = ($this->student->birthplace == null) ? null : $this->student->birthplace;
        $this->address   = ($this->student->address == null) ? null : $this->student->address;

        $this->grade_level_id = ($this->student->grade_level_id == null) ? null : $this->student->grade_level_id;

        /* $this->father_name = ($this->father->name == null) ? null : $this->father->name;
        $this->father_birthdate = ($this->father->birthdate == null) ? null : $this->father->birthdate;
        $this->father_landline = ($this->father->landline == null) ? null : $this->father->landline;
        $this->father_contact_no = ($this->father->contact_no == null) ? null : $this->father->contact_no;
        $this->father_email = ($this->father->email == null) ? null : $this->father->email;
        $this->father_address = ($this->father->address == null) ? null : $this->father->address;
        $this->father_occupation = ($this->father->occupation == null) ? null : $this->father->occupation;
        $this->father_office_address = ($this->father->office_address == null) ? null : $this->father->office_address;
        $this->father_office_contact = ($this->father->office_contact == null) ? null : $this->father->office_contact;

        $this->mother_name = ($this->mother->name == null) ? null : $this->mother->name;
        $this->mother_birthdate = ($this->mother->birthdate == null) ? null : $this->mother->birthdate;
        $this->mother_landline = ($this->mother->landline == null) ? null : $this->mother->landline;
        $this->mother_contact_no = ($this->mother->contact_no == null) ? null : $this->mother->contact_no;
        $this->mother_email = ($this->mother->email == null) ? null : $this->mother->email;
        $this->mother_address = ($this->mother->address == null) ? null : $this->mother->address;
        $this->mother_occupation = ($this->mother->occupation == null) ? null : $this->mother->occupation;
        $this->mother_office_address = ($this->mother->office_address == null) ? null : $this->mother->office_address;
        $this->mother_office_contact = ($this->mother->office_contact == null) ? null : $this->mother->office_contact;

        $this->guardian_name = ($this->guardian->name == null) ? null : $this->guardian->name;
        $this->guardian_contact = ($this->guardian->contact_no == null) ? null : $this->guardian->contact_no;
        $this->guardian_email = ($this->guardian->email == null) ? null : $this->guardian->email;
        $this->guardian_address = ($this->guardian->address == null) ? null : $this->guardian->address;
        $this->guardian_relationship = ($this->guardian->relationship == null) ? null : $this->guardian->relationship; */
    }

    public function increaseStep()
    {
        $this->validateData();
        $this->resetErrorBag();
        sleep(.5);
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }
    public function decreaseStep()
    {
        $this->resetErrorBag();
        sleep(.5);
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {

        if ($this->currentStep == 2) {
            if ($this->promissory_note == 1) {
                $this->validate([
                    'form_137' => 'mimes:pdf,jpg,jpeg,png|max:2192',
                ]);
            } else {
                $this->validate([
                    'form_137' => 'required|mimes:pdf,jpg,jpeg,png|max:2192',
                ]);
            }
        }
        if ($this->currentStep == 3) {
            $this->validate([
                'conPayment' => 'required',
                'payment_method' =>  'required',
                'payment_proof' => (($this->conPayment == 'Bank Deposit') ? 'required|mimes:jpg,jpeg,png|max:2192'  : ''),
            ]);
        }
    }

    public function updated($propertyName)
    {
        if ($this->currentStep == 1) {
            $this->validateOnly($propertyName, [
                'student_lrn' => 'alpha_num|max:12|min:12|unique:students,student_lrn',
            ]);
        }
        if ($this->currentStep == 2) {
            if ($this->promissory_note == 1) {
                $this->validateOnly($propertyName, [
                    'form_137' => 'mimes:pdf,jpg,jpeg,png|max:2192',
                ]);
            } else {
                $this->validateOnly($propertyName, [
                    'form_137' => 'required|mimes:pdf,jpg,jpeg,png|max:2192',
                ]);
            }
        }
        if ($this->currentStep == 3) {
            $this->validateOnly($propertyName, [
                'conPayment' => 'required',
                'payment_method' =>  'required',
                'payment_proof' => (($this->conPayment == 'Bank Deposit') ? 'required|mimes:jpg,jpeg,png|max:2192'  : ''),
            ]);
        }
    }
    public function downloadEForm()
    {

        if ($this->downloadFiles == false) {
            $this->downloadFiles = true;
        } else {
            $this->downloadFiles = false;
        }
        // if yung value ng grade level id ay between 1 - 3 pre school yun
        if ($this->grade_level_id >= 1 && $this->grade_level_id <= 3) {
            $this->preschool = true;
        }
        // if yung value ng grade level id ay between 4 - 9  thats Elementary
        if ($this->grade_level_id >= 4 && $this->grade_level_id <= 9) {
            $this->elem = true;
        }
        // and if yung value ng grade level id ay between 10 - 13  Junior High School
        if ($this->grade_level_id >= 10 && $this->grade_level_id <= 13) {
            $this->jhs = true;
        }

        switch ($this->grade_level_id) {
            case 1:
                $this->grade_level = 'Nursery';
                break;
            case 2:
                $this->grade_level = 'Kindergarten';
                break;
            case 3:
                $this->grade_level = 'Preparatory';
                break;
            case 4:
                $this->grade_level = 'Grade 1';
                break;
            case 5:
                $this->grade_level = 'Grade 2';
                break;
            case 6:
                $this->grade_level = 'Grade 3';
                break;
            case 7:
                $this->grade_level = 'Grade 4';
                break;
            case 8:
                $this->grade_level = 'Grade 5';
                break;
            case 9:
                $this->grade_level = 'Grade 6';
                break;
            case 10:
                $this->grade_level = 'Grade 7';
                break;
            case 11:
                $this->grade_level = 'Grade 8';
                break;
            case 12:
                $this->grade_level = 'Grade 9';
                break;
            case 13:
                $this->grade_level = 'Grade 10';
                break;

            default:
                # code...
                break;
        }
        $this->sy = SchoolYear::where('isCurrent', '=', 1)->first();
    }
    public function clearForm()
    {
        $this->reset();
    }
    public function download()
    {
        $this->dowloadForms  = true;
    }
    public function registerOldStudent()
    {
        $this->validateData();
        $this->resetErrorBag();
        /* update the sy to current sy  */
        $sy = SchoolYear::where('isCurrent', '=', 1)->first();
        $age = Carbon::parse($this->birthdate)->diff(Carbon::now());
        $name = Str::ucfirst($this->first_name) . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . ' ' . Str::ucfirst($this->last_name);
        $grade = $this->grade_level_id + 1;
        if ($grade > 13) {
            $grade = 13;
        }
        try {
            $student  = Student::where('student_id', '=', $this->student->student_id)->firstOrFail();
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
            $payment = Payment::where('student_id', '=', $this->student->id)->firstOrFail();
            $payment->balance = $payment->balance + $balance;
            $payment->reminder_at = $payment_reminder;
            $payment_log = PaymentLog::create([
                'payment_id' => $payment->id,
                'sy_id' => $sy->id,
                'grade_level_id' => $grade,
                'mop' => $this->conPayment,
                'payment_method' => $payment_method,
                'amount' => ($this->payment != null) ? $this->payment :  0,
            ]);
            if ($this->payment_proof != null) {
                FileController::pop($path, $payment->id, $this->payment_proof, $sy->school_year);
            }
            FileController::old($path, $this->student->student_id, $this->form_137);
            $student->age = $age->y;
            $student->grade_level_id = $grade;
            $student->enrollment_sy = $sy->school_year;
            $student->isDone = 1;
            $student->save();
            $payment->save();
            $this->increaseStep();
        } catch (\Throwable $th) {
            dd($th, $this->student->student_id);
        }
    }
    public function render()
    {
        return view('livewire.student.enrollment.form', ['gradelevels' => GradeLevel::all()]);
    }
}
