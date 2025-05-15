<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class MedicalTourismInfo extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['title', 'description', 'sub_title'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/medical-tourism/' . $value)
        );
    }
}
