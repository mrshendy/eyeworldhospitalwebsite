<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BookTopic extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $guarded=[];


    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/BookTopics/' . $value)
        );
    }
}
