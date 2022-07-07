<?php

namespace App\Models\Cashier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $table = 'payment_logs';
    public $guarded = [];
}
