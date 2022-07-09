<?php

namespace App\Models\Registrar;

use App\Models\Cashier\PaymentLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    protected $table = 'school_years';
    public $guarded = [];
    public function payments()
    {
        return $this->hasMany(PaymentLog::class, 'sy_id');
    }
}
