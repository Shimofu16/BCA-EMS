<?php

namespace App\Http\Livewire\Cashier\Payment\Confirmed;

use App\Models\Cashier\Payment;
use App\Models\Registrar\SchoolYear;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\GradeLevel;
use Livewire\Component;

class Index extends Component
{
    public $payments;
    public $grade_name;
    public $byGrade = false;
    public $default = true;
    public function filterByGradeLevel($id)
    {
        $this->payments = Payment::where('status', '=', 1)
            ->where('grade_level_id', '=', $id)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->orderBy('id', 'asc')
            ->get();
        $this->grade_name = GradeLevel::where('id', '=', $id)
            ->first()->grade_name;
        $this->byGrade = true;
        $this->default = false;
        /* try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $this->payments = PaymentLog::where('status', '=', 1)
                ->where('grade_level_id', '=', $id)
                ->where('sy_id', '=', $currentSy->id)
                ->orderBy('id', 'asc')
                ->get();
            $this->grade_name = GradeLevel::where('id', '=', $id)
                ->first()->grade_name;
            $this->byGrade = true;
            $this->default = false;
        } */
    }
    public function resetFilters()
    {
        $this->payments = Payment::where('status', '=', 1)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->orderBy('id', 'asc')
            ->get();
        $this->grade_name = '';
        $this->default = true;
        $this->byGrade = false;
        /* try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();
           
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $this->payments = PaymentLog::where('status', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->orderBy('id', 'asc')
                ->get();
            $this->grade_name = '';
            $this->default = true;
            $this->byGrade = false;
        } */
        $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first();
        $this->gradeLevels = GradeLevel::all();
    }
    public function render()
    {
        return view('livewire.cashier.payment.confirmed.index', [
            'gradeLevels' => GradeLevel::all(),
        ]);
    }
}
