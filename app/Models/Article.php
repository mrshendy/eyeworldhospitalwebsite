<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Article extends Model  implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title','article','desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/articles/' . $value)
        );
    }


    
}
