<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class MedicalDevice extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'description', 'sub_title'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/medical_devices/' . $value)
        );
    }


    public function subSpecialties()
    {
        return $this->belongsToMany(SubSpecialtie::class, 'medical_device_sub_specialty', 'medical_device_id', 'sub_specialty_id');
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialtie::class, 'medical_device_specialty', 'medical_device_id', 'spec_id');
    }

}




