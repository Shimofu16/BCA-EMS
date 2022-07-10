<?php

namespace App\Exports;

use App\Models\Registrar\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
class EnrollmentFormExport implements FromView
{
    use Exportable;
    protected  $student_id;
    public function __construct($student_id)
    {
        $this->student_id = $student_id;
    }
    public function view(): View
    {
        try {
            return view('BCA.Exports.EnrollmentForm', [
                'student' => Student::all()
            ]);
        } catch (\Throwable $th) {
            dd($this->student_id,$th);
        }
    }
}
