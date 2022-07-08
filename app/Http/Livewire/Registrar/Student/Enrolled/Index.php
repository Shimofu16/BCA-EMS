<?php

namespace App\Http\Livewire\Registrar\Student\Enrolled;

use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use App\Models\Registrar\Student;
use Livewire\Component;

class Index extends Component
{
    public $students;
    public $isEnrolled = false;
    public $studentsFilterByGrade;
    public $gradeLevels;
    public $grade_name;
    public $sections;
    public $section_name;
    public $byGrade = false;
    public $bySection = false;
    public $default = true;

    public function filterByGradeLevel($id)
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->first();

            $this->students = Student::where('status', '=', 1)
                ->where('grade_level_id', '=', $id)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'asc')
                ->get();
            $this->sections = Section::where('grade_level_id', '=', $id)->get();
            $this->grade_name = GradeLevel::where('id', '=', $id)
                ->first()->grade_name;
            $this->section_name = '';
            $this->byGrade = true;
            $this->bySection = false;
            $this->default = false;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function filterBySection($id)
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->first();

            $this->students = Student::where('status', '=', 1)
                ->where('section_id', '=', $id)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'asc')
                ->get();
            $this->section_name = Section::where('id', '=', $id)
                ->first()->section_name;
            $this->bySection = true;
            $this->byGrade = false;
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
            ->where('status', 1)
            ->where('sy_id', '=', $currentSy->id)
            ->where('isDone', '=', 1)
            ->orderBy('id', 'asc')
            ->get();
        $this->grade_name = '';
        $this->section_name = '';
        $this->default = true;
        $this->bySection = false;
        $this->byGrade = false;
    }
    public function render()
    {
        return view(
            'livewire.registrar.student.enrolled.index',
            ['defaulSections' => Section::all()]
        );
    }
}
