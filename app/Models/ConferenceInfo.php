<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ConferenceInfo extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description', 'sub_title'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/conferences/' . $value)
        );
    }
}


