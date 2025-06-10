<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class MedicalAcademy extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/medical_academies/' . $value)
        );
    }

    public function videos()
    {
        return $this->hasMany(MedicalAcadmeyVideo::class, 'medical_academy_id');
    }
}
