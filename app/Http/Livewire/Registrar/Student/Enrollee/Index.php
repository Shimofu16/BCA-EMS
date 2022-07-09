<?php

namespace App\Http\Livewire\Registrar\Student\Enrollee;

use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use App\Models\Registrar\Student;
use Livewire\Component;

class Index extends Component
{
    public $students;
    public $gradeLevels;
    public $grade_name;
    public $byGrade = false;
    public $default = true;
    public function filterByGradeLevel($id)
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->first();
            $this->students = Student::where('status', '=', 0)
                ->where('grade_level_id', '=', $id)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'asc')
                ->get();
            $this->sections = Section::where('grade_level_id', '=', $id)->get();
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
        $currentSy = SchoolYear::where('isCurrent', '=', 1)->first();
        $this->sections = Section::all();
        $this->gradeLevels = GradeLevel::all();
        $this->students = Student::with('section', 'gradeLevel')
            ->where('status', 0)
            ->where('sy_id', '=', $currentSy->id)
            ->where('isDone', '=', 1)
            ->orderBy('id', 'asc')
            ->get();
        $this->grade_name = '';
        $this->default = true;
        $this->byGrade = false;
    }
    public function render()
    {
        return view('livewire.registrar.student.enrollee.index');
    }
}
