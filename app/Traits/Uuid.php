<?php
namespace App\Traits;

use App\Models\Company;
use Illuminate\support\str;
trait Uuid
{
    protected static function boot(){
        parent::boot();
        static::creating(function ($model){
            $model->setAttribute(Company::COMPANY_UNIQUE_ID_COLUMN_NAME,Str::uuid()->toString());
        });
    }
    
}
?>