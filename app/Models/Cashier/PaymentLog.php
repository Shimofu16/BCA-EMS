<?php

namespace App\Models\Cashier;

use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use App\Models\Registrar\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $table = 'payment_logs';
    public $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class,'grade_level_id');
    }
    public function sy(){
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
}
