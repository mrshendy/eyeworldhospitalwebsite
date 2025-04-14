<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Right extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];
}





