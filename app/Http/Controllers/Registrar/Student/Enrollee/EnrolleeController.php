<?php

namespace App\Http\Controllers\Registrar\Student\Enrollee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Manage\MailController;
use App\Models\Registrar\Family;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\requirements as Requirement;
use App\Models\Registrar\Section;
use App\Models\Registrar\Student;
use App\Models\Student\StudentAccount;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EnrolleeController extends Controller
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
            ->where('status', 0)
            ->where('sy_id', '=', $currentSy->id)
            ->where('isDone', '=', 1)
            ->orderBy('id', 'asc')
            ->get();
        $gradeLevels = GradeLevel::all();
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
    private function updateStudent($id, $section_id)
    {
        Student::where('id', $id)->update([
            'section_id' => $section_id,
            'status' => 1,
            'updated_by' => Auth::guard('registrar')->user()->name
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($request->input('section_id') == null) {
            alert()->info('SYSTEM MESSAGE', 'Section is required')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
            return back();
        }
        $enrollee = Student::find($id);

        try {
            $psa = Requirement::where('student_id', $enrollee->student_id)
                ->where('filename', 'psa')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            $hasFilePsa = true;
        } catch (ModelNotFoundException $e) {
            $hasFilePsa = false;
        }
        try {
            $form137 = Requirement::where('student_id', $enrollee->student_id)
                ->where('filename', 'form 137')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            $hasFileForm137 = true;
        } catch (ModelNotFoundException $e) {
            $hasFileForm137 = false;
        }
        try {
            $goodMoral = Requirement::where('student_id', $enrollee->student_id)
                ->where('filename', 'good moral')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            $hasFileGoodMoral = true;
        } catch (ModelNotFoundException $e) {
            $hasFileGoodMoral = false;
        }
        try {
            $studentPhoto = Requirement::where('student_id', $enrollee->student_id)
                ->where('filename', 'photo')
                ->where('isSubmitted', 1)
                ->firstOrFail();
            $hasFilePhoto = true;
        } catch (ModelNotFoundException $e) {
            $hasFilePhoto = false;
        }
        if ($enrollee->student_type == 'Old Student') {
            if ($enrollee->hasPromissoryNote == 0 && $hasFileForm137 == true) {
                try {
                    $this->updateStudent($enrollee->id, $request->input('section_id'));
                    $name = Str::ucfirst($enrollee->first_name) . ' ' . Str::ucfirst(Str::substr($enrollee->middle_name, 0, 1)) . ' ' . Str::ucfirst($enrollee->last_name);
                    toast()->success('SYSTEM MESSAGE', 'Successfully Enrolled ' . $name)->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                    return redirect()->route('registrar.enrolled.index');
                } catch (\Throwable $th) {
                    alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();

                    return back();
                }
            } elseif ($enrollee->hasPromissoryNote == 1 || $hasFileForm137 == true) {
                try {
                    $this->updateStudent($enrollee->id, $request->input('section_id'));
                    $name = Str::ucfirst($enrollee->first_name) . ' ' . Str::ucfirst(Str::substr($enrollee->middle_name, 0, 1)) . ' ' . Str::ucfirst($enrollee->last_name);
                    toast()->success('SYSTEM MESSAGE', 'Successfully Enrolled Student ' . $name)->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                    return redirect()->route('registrar.enrolled.index');
                } catch (\Throwable $th) {
                    alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
                    return back();
                }
            }
            toast()->error('ERROR MESSAGE', $enrollee->first_name . '`s requirements is emptry')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return back();
        } else {
            if ($hasFileForm137 == true || $hasFilePsa == true || $hasFileGoodMoral == true || $hasFilePhoto == true) {
                $name = Str::ucfirst($enrollee->first_name) . ' ' . Str::ucfirst(Str::substr($enrollee->middle_name, 0, 1)) . ' ' . Str::ucfirst($enrollee->last_name);
                $firstName = Str::ucfirst($enrollee->first_name);
                $recipient = $enrollee->email;
                $password = 'bca1234';
                $account = new StudentAccount();
                $account->student_id = $enrollee->student_id;
                $account->name = $name;
                $account->email = $enrollee->email;
                $account->password = Hash::make($password);
                $account->gender = $enrollee->gender;
                $account->updated_by = Auth::guard('registrar')->user()->name;
                $account->setCreatedAt(now());
                if ($enrollee !== null) {
                    if ($enrollee->hasVerifiedEmail == 1) {
                        try {
                            $this->updateStudent($enrollee->id, $request->input('section_id'));
                            $enrollee->save();
                            MailController::sendAcceptedMail($firstName, $recipient, $password);
                            toast()->success('SYSTEM MESSAGE', 'Successfully Enrolled Student ' . $name)->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                            return redirect()->route('registrar.enrolled.index');
                        } catch (\Throwable $th) {
                            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();

                            return back();
                        }
                    }
                    toast()->error('ERROR MESSAGE', '<strong class="text-black"> Student`s Email is not verifie')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                    return back();
                }

                /*   Mail::send('admin.registrar-layouts.students.mails.accepted', $details, function ($message) use ($details) {
                    $message->to($details['to'])->subject('Message from BCA');
                }); */
            }
            toast()->error('ERROR MESSAGE', $enrollee->first_name . '`s requirements is emptry')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $student_id = $student->student_id;
        $name = Str::ucfirst($student->first_name) . ' ' . Str::ucfirst(Str::substr($student->middle_name, 0, 1)) . ' ' . Str::ucfirst($student->last_name);
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

        return view('BCA.Admin.registrar-layouts.students.enrollees.show', compact('sections', 'gradeLevels', 'student','father','mother','guardian', 'studentPhoto', 'goodMoral', 'form137File', 'psaFile', 'hasFilePsa', 'hasFileForm137', 'hasFileGoodMoral', 'hasFilePhoto'));
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
