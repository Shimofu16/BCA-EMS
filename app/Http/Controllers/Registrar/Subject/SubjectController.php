<?php

namespace App\Http\Controllers\Registrar\Subject;

use App\Http\Controllers\Controller;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\Section;
use App\Models\Registrar\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $subjects = Subject::orderBy('id', 'asc')->where('grade_level_id', $id)->get();
        $sections = Section::all();
        $gradeLevel = GradeLevel::find($id);
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.subjects.index', compact('subjects', 'sections', 'gradeLevels','gradeLevel'));
    }
    public function subjects(){
        $subjects = Subject::orderBy('id', 'asc')->get();
        $sections = Section::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.subjects.subjects', compact('subjects', 'sections', 'gradeLevels'));
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
        $subjects = Subject::all();
        foreach ($subjects as $subject) {
            if ($subject->subject == $request->input('subject') && $subject->grade_level_id == $request->input('grade_level_id')) {
                toast()->error('SYSTEM MESSAGE', Str::ucfirst($request->input('subject')) . ' is already at the ' . Str::ucfirst($subject->gradeLevel->grade_name) . ' table.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                return redirect()->back();
            }
        }
        try {
            Subject::create([
                'subject' => $request->input('subject'),
                'grade_level_id' => $request->input('grade_level_id'),
                'created_at' => now(),
            ]);
            toast()->success('SYSTEM MESSAGE', Str::ucfirst($request->input('subject')) . ' added successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
            return redirect()->back();
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
        $subjects = Subject::where('grade_level_id', $id)->orderBy('id', 'asc')->get();
        $gradeLevel = GradeLevel::find($id);
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.subjects.show', compact('subjects', 'gradeLevel', 'gradeLevels'));
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
        $subjects = Subject::all();

        try {
            $subject = Subject::findOrFail($id);
            $subject->subject = $request->input('subject');
            $subject->updated_by_user = Auth::guard('registrar')->user()->name;
            $subject->updated_at = now();

            foreach ($subjects as $item) {
                if ($item->subject == $request->input('subject') && $item->grade_level_id == $subject->grade_level_id) {
                    if (!$subject->isDirty('subject')) {
                        toast()->info('<strong class="text-black">' . 'SYSTEM MESSAGE' . '</strong>', '<strong class="text-black"> Nothing changed' . '</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
                        return redirect()->back();
                    }
                    toast()->error('SYSTEM MESSAGE', Str::ucfirst($request->input('subject')) . ' is already at the ' . Str::ucfirst($subject->gradeLevel->grade_name) . ' table.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                    return redirect()->back();
                }
            }
            $subject->update();
            toast()->success('SYSTEM MESSAGE', $request->input('subject') . ' Updated successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $subject = Subject::find($id);
            toast()->success('SYSTEM MESSAGE', $subject->subject . ' Deleted successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            $subject->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
            return redirect()->back();
        }
    }
}
