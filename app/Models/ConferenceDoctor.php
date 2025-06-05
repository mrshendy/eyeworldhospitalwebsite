<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class ConferenceDoctor extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['name', 'specialty'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/conference-doctors' . $value)
        );
    }

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

}
