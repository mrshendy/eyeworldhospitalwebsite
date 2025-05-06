<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Doctor extends Model
{
    //
    protected $guarded=[];

    public function info(){
        return $this->hasOne(DoctorInfo::class);
    }

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/articles/' . $value)
        );
    }
}
