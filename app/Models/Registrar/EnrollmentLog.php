<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentLog extends Model
{
    use HasFactory;
    public $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }
    public function sy()
    {
        return $this->belongsTo(SchoolYear::class, 'sy_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }
    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, 'student_id');
    }
}
