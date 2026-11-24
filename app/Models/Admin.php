<?php

namespace App\Models;

use Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //
    protected $guarded = [];
    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) =>  Hash::make($value),
    //     );
    // }
}
