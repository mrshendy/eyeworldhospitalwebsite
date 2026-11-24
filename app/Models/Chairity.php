<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Chairity extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title'];

    protected $hidden = ['translations'];

    protected $guarded = [];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/charity/'.$value)
        );
    }

    public function conference()
    {
        return $this->belongsTo(Conferenece::class);
    }
}
