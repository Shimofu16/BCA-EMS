<?php

namespace App\Http\Controllers\Registrar\Student\Enrolled;

use App\Http\Controllers\Controller;
use App\Models\Registrar\Family;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use App\Models\Registrar\requirements as Requirement;
use App\Models\Registrar\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByRegistrar', '=', 1)->first();
            $students = Student::with('section', 'gradeLevel')
                ->where('status', '=', 1)
                ->where('enrollment_sy', '=', $currentSy->school_year)
                ->orderBy('id', 'asc')
                ->get();
            $isCurrentSy = true;
        } catch (\Throwable $th) {
            $isCurrentSy = false;
            $currentSy = SchoolYear::where('isCurrentViewByRegistrar', '=', 1)->first();
            $students = Student::with('section', 'gradeLevel')
                ->where('status', '=', 1)
                ->where('sy_id', '=', $currentSy->id)
                ->orderBy('id', 'asc')
                ->get();
        }
        $gradeLevels = GradeLevel::all();
        $sections = Section::all();
        return view('BCA.Admin.registrar-layouts.students.enrolled.index', compact('students', 'gradeLevels', 'sections','isCurrentSy'));
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
        $student = Student::with('gradeLevel')
            ->where('status', 1)
            ->findOrFail($id);
        $student_id = $student->student_id;
        $name =  Str::ucfirst($student->first_name) . ' ' . Str::ucfirst(Str::substr($student->middle_name, 0, 1)) . ' ' . Str::ucfirst($student->last_name);
        $path = 'uploads/requirements/' . $name;
        $psaFile = '';
        $form137File = '';
        $goodMoral = '';
        $studentPhoto = '';
        $fileTypes = [
            'jpg',
            'pdf',
            'jpeg',
            'png',
        ];
        try {
            $psaFile = Requirement::where('student_id', $student->student_id)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            if (!file_exists(storage_path('app/' . $psaFile->filepath))) {
                $psaFile = Requirement::where('student_id', $student->student_id)
                    ->where('filename', 'psa')
                    ->where('isSubmitted', 1)
                    ->delete();
                $hasFilePsa = false;
            } else {
                $hasFilePsa = true;
            }
        } catch (ModelNotFoundException $e) {
            $filePath = storage_path() . '/app/uploads/requirements/' . $name . '/psa.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Requirement::create([
                            'student_id' => $student->student_id,
                            'filename' => 'psa',
                            'filepath' => $path . '/psa.' . $fileType,
                            'isSubmitted' => 1,

                        ]);
                        $psaFile = Requirement::where('student_id', $student->student_id)
                            ->where('filename', 'psa')
                            ->where('isSubmitted', 1)
                            ->firstOrFail();
                        $hasFilePsa = true;
                        break;
                    }
                    $hasFilePsa = false;
                    break;
                }
            }
        }
        try {
            $form137File = Requirement::where('student_id', $student->student_id)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            if (!file_exists(storage_path('app/' . $form137File->filepath))) {
                Requirement::where('student_id', $student->student_id)
                    ->where('filename', 'form 137')
                    ->where('isSubmitted', 1)
                    ->delete();
                $hasFileForm137 = false;
            } else {
                $hasFileForm137 = true;
            }
        } catch (ModelNotFoundException $e) {
            $filePath = storage_path() . '/app/uploads/requirements/' . $name . '/form 137.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Requirement::create([
                            'student_id' => $student->student_id,
                            'filename' => 'form 137',
                            'filepath' => $path . '/form 137.' . $fileType,
                            'isSubmitted' => 1,

                        ]);
                        $form137File = Requirement::where('student_id', $student->student_id)
                            ->where('filename', 'form 137')
                            ->where('isSubmitted', 1)
                            ->firstOrFail();
                        $hasFileForm137 = true;
                        break;
                    }
                    $hasFileForm137 = false;
                    break;
                }
            }
        }
        try {
            $goodMoral = Requirement::where('student_id', $student->student_id)
                ->where('filename', 'good moral')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            if (!file_exists(storage_path('app/' . $goodMoral->filepath))) {
                Requirement::where('student_id', $student->student_id)
                    ->where('filename', 'good moral')
                    ->where('isSubmitted', 1)
                    ->delete();
                $hasFileGoodMoral = false;
            } else {
                $hasFileGoodMoral = true;
            }
        } catch (ModelNotFoundException $e) {
            $filePath = storage_path() . '/app/uploads/requirements/' . $name . '/good moral.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Requirement::create([
                            'student_id' => $student->student_id,
                            'filename' => 'good moral',
                            'filepath' => $path . '/good moral.' . $fileType,
                            'isSubmitted' => 1,

                        ]);
                        $goodMoral = Requirement::where('student_id', $student->student_id)
                            ->where('filename', 'good moral')
                            ->where('isSubmitted', 1)
                            ->firstOrFail();
                        $hasFileGoodMoral = true;
                        break;
                    }
                    $hasFileGoodMoral = false;
                    break;
                }
            }
        }
        try {
            $studentPhoto = Requirement::where('student_id', $student->student_id)
                ->where('filename', 'photo')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            if (!file_exists(storage_path('app/' . $studentPhoto->filepath))) {
                Requirement::where('student_id', $student->student_id)
                    ->where('filename', 'photo')
                    ->where('isSubmitted', 1)
                    ->delete();
                $hasFilePhoto = false;
            } else {
                $hasFilePhoto = true;
            }
        } catch (ModelNotFoundException $e) {
            $filePath = storage_path() . '/app/uploads/requirements/' . $name . '/photo.';
            foreach ($fileTypes as $fileType) {
                $filePath = $filePath . $fileType;
                $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                if ($extension !== null) {
                    if (file_exists($filePath)) {
                        Requirement::create([
                            'student_id' => $student->student_id,
                            'filename' => 'photo',
                            'filepath' => $path . '/photo.' . $fileType,
                            'isSubmitted' => 1,
                        ]);
                        $studentPhoto = Requirement::where('student_id', $student->student_id)
                            ->where('filename', 'photo')
                            ->where('isSubmitted', 1)
                            ->firstOrFail();
                        $hasFilePhoto = true;
                        break;
                    }
                    $hasFilePhoto = false;
                    break;
                }
            }
        }
        $father = Family::where('student_id', $student->student_id)->where('relationship_type', 'father')->first();
        $mother = Family::where('student_id', $student->student_id)->where('relationship_type', 'mother')->first();
        $guardian = Family::where('student_id', $student->student_id)->where('relationship_type', 'guardian')->first();
        $sections = Section::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.students.enrolled.show', compact('sections', 'gradeLevels', 'student', 'father', 'mother', 'guardian', 'studentPhoto',  'goodMoral', 'form137File', 'psaFile', 'hasFilePsa', 'hasFileForm137', 'hasFileGoodMoral', 'hasFilePhoto'));
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
        try {
            $student = Student::findOrFail($id);
            $age = Carbon::parse($request->input('birthdate'))->diff(Carbon::now());
            $student->student_lrn = $request->input('student_lrn');
            $student->first_name = $request->input('first_name');
            $student->middle_name = $request->input('middle_name');
            $student->last_name = $request->input('last_name');
            $student->gender = $request->input('gender');
            $student->age = $age->y;
            $student->email = $request->input('email');
            $student->birthdate = $request->input('birthdate');
            $student->birthplace = $request->input('birthplace');
            $student->address = $request->input('address');
            $student->section_id = $request->input('section_id');
            $student->grade_level_id = $request->input('grade_level_id');
            if ($student->isDirty()) {
                $student->update();
                toast()->success('SYSTEM MESSAGE', 'Updated successfully.')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                return redirect()->back();
            }
            toast()->info('SYSTEM MESSAGE', ' Nothing changed')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
            return redirect()->back();
        }
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
