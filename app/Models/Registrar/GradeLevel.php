<?php

namespace App\Models\Registrar;

use App\Models\Cashier\Payment;
use App\Models\Registrar\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;
    protected $table = 'grade_levels';
    public $guarded = [];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'grade_level_id');
    }
}
