<?php

namespace App\Models\Registrar;

use App\Models\Cashier\Payment;
use App\Models\Cashier\PaymentLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    protected $table = 'school_years';
    public $guarded = [];
    public function students()
    {
        return $this->hasMany(Student::class, 'sy_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'sy_id');
    }
    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, 'sy_id');
    }
}
