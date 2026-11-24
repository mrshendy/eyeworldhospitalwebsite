<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Specialtie extends Model implements TranslatableContract
{
    //
    use Translatable;

    public $translatedAttributes = ['title', 'desc', 'detail_title', 'detail_subtitle'];

    protected $guarded = [];

    protected $hidden = ['translations'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/specialtie/'.$value)
        );
    }
}
