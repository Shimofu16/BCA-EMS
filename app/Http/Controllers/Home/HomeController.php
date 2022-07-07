<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('BCA.Home.pages.home.index');
    }
    public function about()
    {
        return view('BCA.Home.pages.about us.index');
    }
    public function academics()
    {
        return view('BCA.Home.pages.academics.index');
    }
    public function primary()
    {
        return view('BCA.Home.pages.academics.primary.index');
    }
    public function nursery()
    {
        return view('BCA.Home.pages.academics.primary.all.index');
    }
    public function elementary()
    {
        return view('BCA.Home.pages.academics.elementary.index');
    }
    public function juniorhighschool()
    {
        return view('BCA.Home.pages.academics.junior highschool.index');
    }
    public function calendar()
    {
        $events = Event::all();
        return view('BCA.Home.pages.calendar.index',compact('events'));
    }
    public function photo(){
        return view('BCA.Home.pages.photo gallery.index');
    }
    public function enroll()
    {
        $sections = Section::all();
        $gradelevels = GradeLevel::all();
        $sy = SchoolYear::find(1);
        return view('BCA.Home.pages.enrollment form.index', compact('sections', 'gradelevels','sy'));
    }
    public function portal()
    {
        return view('BCA.Home.pages.portal.buttons');
    }
    public function special()
    {
        return view('BCA.Home.pages.portal.buttonTwo');
    }
}
