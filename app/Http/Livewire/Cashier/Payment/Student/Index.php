<?php

namespace App\Http\Livewire\Cashier\Payment\Student;

use App\Models\Cashier\Payment;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
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
            $this->grade = GradeLevel::where('id', '=', $id)
                ->first();
            $this->byGrade = true;
            $this->default = false;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function resetFilters()
    {
        $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first();
        $this->grade ='';
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
