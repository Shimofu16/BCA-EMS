<?php

namespace App\Http\Livewire\Registrar\Student;

use App\Http\Controllers\Manage\FileController;
use App\Models\Registrar\requirements as Requirement;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $student;
    public $father, $mother, $guardian;
    public $sections;
    public $left = 1, $center = 0, $right = 0;
    public $psa = '', $form_137 = '', $good_moral = '', $photo = '';
    public $hasFilePsa, $hasFileForm137, $hasFileGoodMoral, $hasFilePhoto;
    public $studentPhoto, $goodMoral, $form137File, $psaFile;
    public $promisory_note;

    protected  $validationAttributes  = [
        'psa' => 'Birth Certificate',
        'form_137' => 'Form 138',
        'good_moral' => 'Good Moral Certification',
        'photo' => '1x1 Photo',
    ];
    public function mount()
    {
        $this->promisory_note = $this->student->hasPromissoryNote;
    }
    public function moveLeft()
    {
        $this->left = 1;
        $this->center = 0;
        $this->right = 0;
    }
    public function moveCenter()
    {
        $this->center = 1;
        $this->left = 0;
        $this->right = 0;
    }
    public function moveRight()
    {
        $this->right = 1;
        $this->center = 0;
        $this->left = 0;
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'psa' => 'mimes:pdf,jpg,jpeg,png|max:8192',
            'form_137' => 'mimes:pdf,jpg,jpeg,png|max:8192',
            'good_moral' => 'mimes:pdf,jpg,jpeg,png|max:8192',
            'photo' => 'mimes:jpg,jpeg,png|max:2192',
        ]);
    }
    public function validateFile()
    {

        if ($this->student->student_type == 'New Stdent') {
            if ($this->student->hasPromissoryNote == 0) {
                $this->validate([
                    'psa' => (($this->hasFilePsa == false) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                    'photo' => (($this->hasFilePhoto == false) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                ]);
            } else {
                $this->validate([
                    'photo' => (($this->hasFilePhoto == false) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                ]);
            }
        }
        if ($this->student->student_type == 'Old Student') {

            if ($this->student->hasPromissoryNote == 0) {
                $this->validate([
                    'form_137' => (($this->hasFileForm137 == false) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                ]);
            }
        }
        if ($this->student->student_type == 'Transferee') {
            if ($this->student->hasPromissoryNote == 1) {
                $this->validate([
                    'psa' => (($this->hasFilePsa == false) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                    'form_137' => (($this->hasFileForm137 == false) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                    'good_moral' => (($this->hasFileGoodMoral == false) ? 'required|'  : '') . 'mimes:pdf,jpg,jpeg,png|max:8192',
                    'photo' => (($this->hasFilePhoto == false) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                ]);
            } else {
                $this->validate([
                    'photo' => (($this->hasFilePhoto == false) ? 'required|'  : '') . 'mimes:jpg,jpeg,png|max:2192',
                ]);
            }
        }
    }
    public function fileUpload()
    {
        $this->validateFile();
        $this->resetErrorBag();
        $name = Str::ucfirst($this->student->first_name) . ' ' . Str::ucfirst(Str::substr($this->student->middle_name, 0, 1)) . ' ' . Str::ucfirst($this->student->last_name);
        $student_id = $this->student->student_id;
        $path = 'uploads/requirements/' . $name;
        try {
            FileController::requirements($path, $student_id, $this->psa, $this->form_137, $this->good_moral, $this->photo);
            if ($this->psa != null) {
                $this->psaFile = Requirement::where('student_id', $this->student->student_id)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->firstOrFail();
                $this->hasFilePsa = true;
            }
            if ($this->form_137 != null) {
                $this->form137File = Requirement::where('student_id', $this->student->student_id)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->firstOrFail();
                $this->hasFileForm137 = true;
            }
            if ($this->good_moral != null) {
                $this->goodMoral = Requirement::where('student_id', $this->student->student_id)
                ->where('filename', 'good moral')
                ->where('isSubmitted', 1)
                ->firstOrFail();
                $this->hasFileGoodMoral = true;
            }
            if ($this->photo != null) {
                $this->studentPhoto =  Requirement::where('student_id', $this->student->student_id)
                    ->where('filename', 'photo')
                    ->where('isSubmitted', 1)
                    ->firstOrFail();
                $this->hasFilePhoto = true;
            }
            $this->reset(['psa', 'form_137', 'good_moral', 'photo']);
            session()->flash('message', 'Upload success.');
        } catch (\Throwable $th) {
            session()->flash('message', 'error.');
        }
    }
    public function render()
    {
        return view('livewire.registrar.student.show');
    }
}
