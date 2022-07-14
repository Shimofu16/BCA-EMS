<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    public $guarded = [];
    /* relationship of subjects and teacher*/
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
