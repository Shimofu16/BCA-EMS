<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    public $guarded = [];
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
