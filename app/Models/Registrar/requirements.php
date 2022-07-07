<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirements extends Model
{
    use HasFactory;
    protected $table = 'requirements';
    public $guarded = [];
}
