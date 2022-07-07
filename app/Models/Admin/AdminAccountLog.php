<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccountLog extends Model
{
    use HasFactory;
    protected $table = 'admin_account_logs';
    public $guarded = [];
}
