<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class SocialMedia extends Model
{
    //
    protected $guarded=[];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/socialMedia/' . $value)
        );
    }
}
