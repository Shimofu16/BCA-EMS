<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccountLog extends Model
{
    use HasFactory;
    protected $table = 'admin_account_logs';
    public $guarded = [];
}
