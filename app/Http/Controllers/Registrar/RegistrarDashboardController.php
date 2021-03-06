<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Registrar\EnrollmentLog;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use App\Models\Registrar\Student;
use App\Models\Registrar\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrarDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolleeCount = Student::where('status', 0)
            ->where('isDone', '=', 1)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->count();
        $enrolledCount = Student::where('status', 1)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->where('isDone', '=', 1)
            ->count();
        $sectionCount = Section::count();
        $teacherCount = Teacher::count();
        $gradeLevels = GradeLevel::all();
        $sy = SchoolYear::all();
        $newStudentsCount = Student::where('student_type', 'New Student')
            ->where('hasVerifiedEmail', '=',  1)
            ->where('status', '=',  0)
            ->where('isDone', '=', 1)
            ->count();
        $newStudents = Student::where('student_type', 'New Student')
            ->where('hasVerifiedEmail', 1)
            ->where('status', 0)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->where('isDone', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        $oldStudentsCount = Student::where('student_type', 'Old Student')
            ->where('hasVerifiedEmail', '=',  1)
            ->where('status', '=',  0)
            ->where('isDone', '=', 1)
            ->count();
        $oldStudents = Student::where('student_type', 'Old Student')
            ->where('hasVerifiedEmail', 1)
            ->where('status', 0)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->where('isDone', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        $oldStudentsCountTotal = Student::where('student_type', 'Old Student')
            ->where('status', '=',  0)
            ->count();
        $transfereeStudentsCount = Student::where('student_type', 'Transferee')
            ->where('hasVerifiedEmail', '=',  1)
            ->where('status', '=',  0)
            ->where('isDone', '=', 1)
            ->count();
        $transfereeStudents = Student::where('student_type', 'Transferee')
            ->where('hasVerifiedEmail', 1)
            ->where('status', 0)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->where('isDone', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        $unverifiedStudents = Student::where('hasVerifiedEmail', 0)
            ->where('status', 0)
            /* ->where('sy_id', '=', $currentSy->id) */
            ->where('isDone', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('BCA.Admin.registrar-layouts.dashboard.index', compact('newStudents', 'newStudentsCount', 'oldStudents', 'oldStudentsCount', 'oldStudentsCountTotal', 'transfereeStudents', 'transfereeStudentsCount', 'unverifiedStudents', 'sy', 'enrolleeCount', 'enrolledCount', 'sectionCount', 'teacherCount', 'gradeLevels'));
        /* try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByRegistrar', '=', 1)->firstOrFail();
            $enrolleeCount = Student::where('status', '=', 0)
                ->where('isDone', '=', 1)
                ->where('hasVerifiedEmail', '=', 1)
                ->where('sy_id', '=', $currentSy->id) 
                ->count();
            $enrolledCount = Student::where('status', '=', 1)
                ->where('isDone', '=', 1)
                ->where('hasVerifiedEmail', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->count();
            $unverifiedStudents = Student::where('hasVerifiedEmail', 0)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $newStudents = Student::where('student_type', 'New Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $newStudentsCount = Student::where('student_type', 'New Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->count();
            $oldStudents = Student::where('student_type', 'Old Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $oldStudentsCount = Student::where('student_type', 'Old Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->count();
            $oldStudentsCountTotal = Student::where('student_type', 'Old Student')
                ->where('status', '=',  0)
                ->count();
            $transfereeStudents = Student::where('student_type', 'Transferee')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $transfereeStudentsCount = Student::where('student_type', 'Transferee')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->count();

            $sectionCount = Section::count();
            $teacherCount = Teacher::count();
            $gradeLevels = GradeLevel::all();
            $sy = SchoolYear::all();
            $isCurrentSy = true;
            return view('BCA.Admin.registrar-layouts.dashboard.index', compact('newStudents', 'oldStudents', 'transfereeStudents', 'unverifiedStudents', 'sy', 'enrolleeCount', 'enrolledCount', 'sectionCount', 'teacherCount', 'gradeLevels', 'newStudentsCount', 'oldStudentsCount', 'transfereeStudentsCount', 'oldStudentsCountTotal', 'isCurrentSy'));
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByRegistrar', '=', 1)->first();
            $enrolleeCount = EnrollmentLog::where('status', '=', 0)
                ->where('isDone', '=', 1)
                ->where('hasVerifiedEmail', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->count();
            $enrolledCount = EnrollmentLog::where('status', '=', 1)
                ->where('isDone', '=', 1)
                ->where('hasVerifiedEmail', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->count();
            $unverifiedStudents = EnrollmentLog::where('hasVerifiedEmail', 0)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $newStudents = EnrollmentLog::where('student_type', 'New Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $newStudentsCount = EnrollmentLog::where('student_type', 'New Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->count();
            $oldStudents = EnrollmentLog::where('student_type', 'Old Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $oldStudentsCount = EnrollmentLog::where('student_type', 'Old Student')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('isDone', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->count();
            $oldStudentsCountTotal = EnrollmentLog::where('student_type', 'Old Student')
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->count();
            $transfereeStudents = EnrollmentLog::where('student_type', 'Transferee')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            $transfereeStudentsCount = EnrollmentLog::where('student_type', 'Transferee')
                ->where('hasVerifiedEmail', '=',  1)
                ->where('status', '=',  0)
                ->where('sy_id', '=', $currentSy->id)
                ->where('isDone', '=', 1)
                ->count();
            $sectionCount = Section::count();
            $teacherCount = Teacher::count();
            $gradeLevels = GradeLevel::all();
            $sy = SchoolYear::all();
            $isCurrentSy = false;
            return view('BCA.Admin.registrar-layouts.dashboard.index', compact('newStudents', 'oldStudents', 'transfereeStudents', 'unverifiedStudents', 'sy', 'enrolleeCount', 'enrolledCount', 'sectionCount', 'teacherCount', 'gradeLevels', 'newStudentsCount', 'oldStudentsCount', 'transfereeStudentsCount', 'oldStudentsCountTotal', 'isCurrentSy'));
        } */
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
