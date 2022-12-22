<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationRight extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
