<?php

namespace App\Exports;

use App\Models\Registrar\Student;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrolleesExport implements
    FromQuery,
    ShouldAutoSize,
    WithHeadings,
    WithMapping

{
    use Exportable;

    /**
     * @return \Illuminate\Support\Query
     */
    public function query()
    {
        return Student::where('status', '=', 0)->with(['gradeLevel', 'sy']);
    }
    public function headings(): array
    {
        return [
            'ID',
            'Student Id',
            'Student LRN',
            'First Name',
            'Middle Name',
            'Last Name',
            'Ext. Name',
            'Gender',
            'Age',
            'Email',
            'Birthdate',
            'Birthplace',
            'Address',
            'Grade Level',
            'School Year',
            'Student Type',
            'hasVerifiedEmail',
            'hasPromissoryNote',
            'balance',
            'reminder_at',
            'updated_by',
            'created_at',
            'updated_at',
        ];
    }
    public function map($student): array
    {
        return [
            $student->id,
            $student->student_id,
            $student->student_lrn,
            $student->first_name,
            $student->middle_name,
            $student->last_name,
            $student->ext_name,
            $student->gender,
            $student->age,
            $student->email,
            $student->birthdate,
            $student->birthplace,
            $student->address,
            $student->gradeLevel->grade_name,
            $student->sy->school_year,
            $student->student_type,
            $student->hasVerifiedEmail,
            $student->hasPromissoryNote,
            $student->balance,
            $student->reminder_at,
            $student->updated_by,
            $student->created_at,
            $student->updated_at,
        ];
    }
}
