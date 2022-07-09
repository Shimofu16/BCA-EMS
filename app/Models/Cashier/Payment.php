<?php

namespace App\Models\Cashier;

use App\Models\Registrar\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $guarded = [];
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function payments(){
        return $this->hasMany(PaymentLog::class,'payment_id');
    }
}
