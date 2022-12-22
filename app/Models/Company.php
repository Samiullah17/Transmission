<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Uuid;
    use HasFactory;
    protected $table ="companies";

    const COMPANY_UNIQUE_ID_COLUMN_NAME = 'company_unique_id';

    const COMPANY_FILE_STORAGE_LOCATION = 'public/dist/img';
    // public function RegistrationRight()
    // {
    //     return $this->belongsTo(RegistrationRight::class);
    // }
}
