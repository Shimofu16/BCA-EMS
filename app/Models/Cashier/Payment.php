<?php

namespace App\Models\Cashier;

use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class);
    }
    public function sy(){
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
}
