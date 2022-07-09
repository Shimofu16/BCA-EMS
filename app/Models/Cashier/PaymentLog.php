<?php

namespace App\Models\Cashier;

use App\Models\Registrar\GradeLevel;
use App\Models\Registrar\SchoolYear;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $table = 'payment_logs';
    public $guarded = [];
    public function gradeLevel(){
        return $this->belongsTo(GradeLevel::class);
    }
    public function sy(){
        return $this->belongsTo(SchoolYear::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
