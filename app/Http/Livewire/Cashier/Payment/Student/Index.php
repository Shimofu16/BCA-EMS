<?php

namespace App\Http\Livewire\Cashier\Payment\Student;

use App\Models\Cashier\Payment;
use App\Models\Registrar\EnrollmentLog;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Livewire\Component;

class Index extends Component
{
    public $payments;
    public $grade;
    public $byGrade = false;
    public $default = true;
    public function filterByGradeLevel($id)
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $payments = Student::where('sy_id', '=', $currentSy->id)->where('grade_level_id', '=', $id)->get();
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $payments = EnrollmentLog::where('sy_id', '=', $currentSy->id)->where('grade_level_id', '=', $id)->get();
        }
        $this->grade = GradeLevel::where('id', '=', $id)
            ->first();
        $this->byGrade = true;
        $this->default = false;
    }
    public function resetFilters()
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();

            $payments = Student::where('sy_id', '=', $currentSy->id)->get();
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $payments = EnrollmentLog::where('sy_id', '=', $currentSy->id)->get();
        }
        $this->grade = '';
        $this->default = true;
        $this->byGrade = false;
    }
    public function render()
    {
        return view('livewire.cashier.payment.student.index', [
            'gradeLevels' => GradeLevel::all(),
        ]);
    }
}
