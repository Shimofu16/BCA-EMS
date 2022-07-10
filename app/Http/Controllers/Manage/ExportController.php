<?php

namespace App\Http\Controllers\Manage;

use App\Exports\EnrollmentFormExport;
use App\Exports\OldStudentExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public static function exportForm($student_id){
        try {

            return (new EnrollmentFormExport($student_id))->download('enrollment.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
