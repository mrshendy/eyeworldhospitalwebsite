<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Video extends Model  implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/articles/' . $value)
        );
    }
}



