<?php

namespace App\Http\Livewire\Cashier\Payment\Confirmed;

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
        try {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first();
            $this->payments = PaymentLog::where('status', '=', 1)
                ->where('grade_level_id', '=', $id)
                ->where('sy_id', '=', $currentSy->id)
                ->orderBy('id', 'asc')
                ->get();
            $this->grade_name = GradeLevel::where('id', '=', $id)
                ->first()->grade_name;
            $this->byGrade = true;
            $this->default = false;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function resetFilters()
    {
        $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->first();
        $this->gradeLevels = GradeLevel::all();
        $this->payments = PaymentLog::where('status', 1)
            ->where('sy_id', '=', $currentSy->id)
            ->orderBy('id', 'asc')
            ->get();
        $this->grade_name = '';
        $this->default = true;
        $this->byGrade = false;
    }
    public function render()
    {
        return view('livewire.cashier.payment.confirmed.index', [
            'gradeLevels' => GradeLevel::all(),
        ]);
    }
}
