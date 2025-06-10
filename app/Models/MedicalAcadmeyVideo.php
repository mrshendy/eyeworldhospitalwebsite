<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class MedicalAcadmeyVideo extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/medical_academies/thumbnails' . $value)
        );
    }

    public function medicalAcademy()
    {
        return $this->belongsTo(MedicalAcademy::class, 'medical_academy_id');
    }
}
