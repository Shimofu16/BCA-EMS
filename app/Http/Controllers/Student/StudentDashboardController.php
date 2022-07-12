<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $student=  Student::where('student_id', Auth::guard('student')->user()->student_id)->first();
        $payment = Payment::where('student_id','=',$student->id)->first();
        $paymentLogs = PaymentLog::where('payment_id','=',$payment->id)->get();
        $paymentCount1 = PaymentLog::where('payment_id','=',$payment->id)->where('status','=',1)->count();
        $paymentCount0 = PaymentLog::where('payment_id','=',$payment->id)->where('status','=',0)->count();
        return view('BCA.Admin.student-layouts.dashboard.index',compact('paymentLogs','paymentCount0','paymentCount1','payment'));
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
