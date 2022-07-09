<?php

namespace App\Http\Controllers\Registrar\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\Subject;
use App\Models\Registrar\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'asc')->get();
        $subjects = Subject::all();
        $gradeLevels = GradeLevel::all();
        return view('BCA.Admin.registrar-layouts.teacher.index', compact('teachers', 'subjects', 'gradeLevels'));
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
            Teacher::create(
                $request->all()
            );
            toast()->success('SYSTEM MESSAGE', $request->name . ' Successfully Added')->autoClose(3000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
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
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update(
                $request->all()
            );
            if ($teacher->wasChanged()) {
                toast()->success('<strong class="text-black">' . 'SYSTEM MESSAGE' . '</strong>', '<strong class="text-black"> Update successfully' . '</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
                return redirect()->back();
            }
            toast()->info('<strong class="text-black">' . 'SYSTEM MESSAGE' . '</strong>', '<strong class="text-black"> Nothing changed.' . '</strong>')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
            return redirect()->back();
        } catch (\Throwable $th) {
            alert()->info('SYSTEM MESSAGE', $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__zoomIn', 'animate__zoomOutDown')->timerProgressBar();

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
