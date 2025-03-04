<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SubSpecialtie  extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title'];
    protected $guarded=[];
    protected $hidden = ['translations'];
}
