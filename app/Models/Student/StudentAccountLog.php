<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccountLog extends Model
{
    use HasFactory;
    protected $table = 'student_account_logs';
    public $guarded = [];
}
