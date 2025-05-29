<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DoctorInfo extends Model implements TranslatableContract
{
    //
     use Translatable;
    protected $guarded=[];
    protected $hidden = ['translations'];
    public $translatedAttributes = ['job_title','title','sub_title','breif','desc','name'];
    protected $translationForeignKey = 'info_id';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
