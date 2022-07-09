<?php

namespace App\Http\Controllers\Registrar\Section;

use App\Http\Controllers\Controller;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\Section;
use App\Models\Registrar\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sections = Section::with('students')->orderBy('id', 'asc')
            ->where('grade_level_id', $id)->get();
        $title = GradeLevel::find($id);
        $teachers = Teacher::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.section.index', compact('sections', 'title', 'teachers', 'gradeLevels'));
    }
    public function section()
    {
        $sections = Section::with('students')->orderBy('id', 'asc')
            ->get();
        $teachers = Teacher::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.section.sections', compact('sections', 'teachers', 'gradeLevels'));
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

        try {
            $hasSection = $this->checkSection($request->input('section_name'));
            if ($hasSection) {
                toast()->error('SYSTEM MESSAGE', Str::ucfirst($request->input('section_name')) . ' is already at the other table.')->autoClose(6000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                return redirect()->back();
            }
            Section::create([
                'section_name' => $request->input('section_name'),
                'teacher_id' => ($request->input('teacher_id') == '-- Select Adviser --') ? null :  $request->input('teacher_id'),
                'grade_level_id' => ($request->input('grade_level_id') == '-- Select Grade Level --') ? null :  $request->input('grade_level_id'),
            ]);
            toast()->success('SYSTEM MESSAGE', 'Section ' . Str::ucfirst($request->section_name) . ' added successfully.')->autoClose(6000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);
        $sections = Section::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.section.show', compact('sections', 'section', 'gradeLevels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $section = Section::findOrFail($id);
            $section->section_name = $request->input('section_name');
            $section->teacher_id = ($request->input('teacher_id') == 'delete') ? null :  $request->input('teacher_id');
            $section->updated_by_user = Auth::guard('registrar')->user()->name;
            $section->updated_at = now();
            $hasSection = $this->checkSection($request->input('section_name'));
            if (!$section->isDirty('teacher_id', 'section_name')) {
                toast()->info('SYSTEM MESSAGE', ' Nothing changed')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                return redirect()->back();
            }
            if ($section->isDirty('section_name')) {
                if ($hasSection) {
                    toast()->error('SYSTEM MESSAGE', Str::ucfirst($request->input('section_name')) . ' is already at the other table.')->autoClose(6000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
                    return redirect()->back();
                }
            }
            $section->update();
            toast()->success('SYSTEM MESSAGE', 'Updated successfully.')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(6000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();

            return redirect()->back();
        }
    }

    private function checkSection($section)
    {
        $sections = Section::all();
        foreach ($sections as $item) {
            if (Str::lower($item->section_name) == Str::lower($section)) {
                return true;
                break;
            }
        }
        return false;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section->students->count() == null) {
            $secName = $section->section_name;
            $section->delete();
            toast()->success('SYSTEM MESSAGE', Str::ucfirst($secName) . ' was successfully deleted.')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        }
        toast()->error('SYSTEM MESSAGE' . 'Section ' . $section->section_name . ' can\'t be deleted. ')->autoClose(6000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
        return redirect()->back();
    }
}
