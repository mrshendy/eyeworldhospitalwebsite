<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class Conference extends Model
{
    use Translatable;
    public $translatedAttributes = ['title', 'description', 'sub_title', 'detail_description'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/conferences/' . $value)
        );
    }

    public function advantages()
    {
        return $this->hasMany(ConferenceAdvantge::class);
    }

    public function images()
    {
        return $this->hasMany(ConferenceImage::class);
    }

    public function charities()
    {
        return $this->hasMany(Chairity::class);
    }
    public function guests()
    {
        return $this->belongsToMany(Guest::class)->withPivot([
            'employer', 'doctor_type', 'participation_type', 'attendance_details'
        ])->withTimestamps();
    }

}
