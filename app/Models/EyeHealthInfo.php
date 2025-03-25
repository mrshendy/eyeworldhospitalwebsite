<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class EyeHealthInfo extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title', 'subtitle','desc','detail_title','detail_subtitle','detail_desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];
    protected $translationForeignKey = 'info_id';
}
