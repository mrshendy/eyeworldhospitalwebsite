<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class InsurancePartner extends Model
{
    //
    use Translatable;
    public $translatedAttributes = ['title'];
    protected $guarded=[];
    protected $hidden = ['translations'];
    protected $translationForeignKey = 'partner_id';

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/partners/' . $value)
        );
    }

    public function doctors()
    {
        return $this->belongsToMany(
                Doctor::class,
                'doctor_insurance_partners',
                'partner_id',
                'doctor_id'
            );
    }


}


