<?php

namespace App\Http\Controllers\Cashier\Payment\Student;

use App\Http\Controllers\Controller;
use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use App\Models\Registrar\EnrollmentLog;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Illuminate\Http\Request;

class StudentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Student::get();
        /* try {
            $currentSy = SchoolYear::where('isCurrent', '=', 1)->where('isEnrollment', '=', 1)->where('isCurrentViewByCashier', '=', 1)->firstOrFail();

            $payments = Student::where('sy_id', '=', $currentSy->id)->get();
        } catch (\Throwable $th) {
            $currentSy = SchoolYear::where('isCurrentViewByCashier', '=', 1)->firstOrFail();
            $payments = EnrollmentLog::where('sy_id', '=', $currentSy->id)->get();
        } */

        return view('BCA.Admin.cashier-layout.payments.student.index', compact('payments'));
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
