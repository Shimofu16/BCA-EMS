<?php

namespace App\Http\Controllers\Registrar\Student\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use App\Models\Registrar\Student;
use Illuminate\Http\Request;

class EnrolleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentSy = SchoolYear::where('isCurrent', '=', 1)->first();
        $students = Student::with('section', 'gradeLevel')
            ->where('status', 1)
            ->where('sy_id', '=', $currentSy->id)
            ->where('isDone', '=', 1)
            ->orderBy('id', 'asc')
            ->get();
        $gradeLevels = GradeLevel::all();
        $sections = Section::all();
        return view('BCA.Admin.registrar-layouts.students.enrollees.index', compact('students', 'gradeLevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
