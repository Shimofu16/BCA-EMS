<?php

namespace App\Models\Registrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    public $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
