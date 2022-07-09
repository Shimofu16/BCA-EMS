<?php

namespace App\Models\Registrar;

use App\Models\Cashier\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }
    public function sy()
    {
        return $this->belongsTo(SchoolYear::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
