<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DoctorServiceInfo extends Model implements TranslatableContract
{
    //
    use Translatable;

    protected $guarded = [];

    protected $hidden = ['translations'];

    public $translatedAttributes = ['info'];

    protected $translationForeignKey = 'info_id';
}
