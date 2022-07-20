<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('BCA.Admin.admin-layouts.manage.events.index', compact('events'));
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
            Event::create([
                'title' => $request->input('title'),
                'start' => $request->input('start'),
                'end' =>$request->input('end'),
                'time' => $request->input('time'),
                'color' => $request->input('color'),
            ]);
            toast()->success('SYSTEM MESSAGE', $request->input('title') . ' Added successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->error('SYSTEM MESSAGE', ($th->getCode() == 23000) ? $th->getCode() . '' : $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
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
            $event = Event::find($id);
            $event->title = $request->input('title');
            $event->start = $request->input('start');
            $event->end = $request->input('end');
            $event->time = $request->input('time');
            $event->color = $request->input('color');
            $event->save();
            if ($event->isDirty()) {
                toast()->info('SYSTEM MESSAGE', 'Nothing changed')->autoClose(5000)->width('400px')->padding('10px')->background('#f8f9fc')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar()->toHtml();
                return redirect()->back();
            }
            toast()->success('SYSTEM MESSAGE', $request->input('title') . ' Updated successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->error('SYSTEM MESSAGE', ($th->getCode() == 23000) ? $th->getCode() . '' : $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
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
        try {
            $event = Event::find($id);
            toast()->success('SYSTEM MESSAGE', $event->title . ' Deleted successfully.')->autoClose(5000)->width('500px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            $event->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->error('SYSTEM MESSAGE', ($th->getCode() == 23000) ? $th->getCode() . '' : $th->getMessage())->autoClose(5000)->width('400px')->animation('animate__fadeInRight', 'animate__fadeOutDown')->timerProgressBar();
            return redirect()->back();
        }
    }
}
