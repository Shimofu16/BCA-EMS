<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Registrar\Family;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->firstOrFail();
            $isEnrollment = true;
        } catch (\Throwable $th) {
            $isEnrollment = false;
        }
        $student = Student::where('student_id', Auth::guard('student')->user()->student_id)->first();
        $father = Family::where('student_id', Auth::guard('student')->user()->student_id)->where('relationship_type', 'father')->first();
        $mother = Family::where('student_id', Auth::guard('student')->user()->student_id)->where('relationship_type', 'mother')->first();
        $guardian = Family::where('student_id', Auth::guard('student')->user()->student_id)->where('relationship_type', 'guardian')->first();
        return view('BCA.Admin.student-layouts.enrollment.index', compact('student', 'father', 'mother', 'guardian', 'isEnrollment'));
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
