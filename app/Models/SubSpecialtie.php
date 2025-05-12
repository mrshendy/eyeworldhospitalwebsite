<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SubSpecialtie  extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['main_title','main_subtitle','detail_title','subtitle','desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];


    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/specialtie/' . $value)
        );
    }


    public function medicalDevices()
    {
        return $this->belongsToMany(MedicalDevice::class, 'medical_device_sub_specialty', 'sub_specialty_id', 'medical_device_id');
    }

}
