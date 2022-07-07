<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrarAccountLog extends Model
{
    use HasFactory;
    protected $table = 'registrar_account_logs';
    public $timestamps = false;
    public $guarded = [];
}
