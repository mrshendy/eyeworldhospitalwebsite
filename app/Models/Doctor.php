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

    public function serviceinfo(){
        return $this->hasOne(DoctorServiceInfo::class);
    }
   
    public function partners(){
        return $this->hasOne(DoctorInsurancePartner::class);
    }

    public function specialties(){
        return $this->hasOne(DoctorSpecialtie::class);
    }


    public function subspecialties(){
        return $this->hasOne(DoctorSubSpecialtie::class);
    }


    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/articles/' . $value)
        );
    }
}
