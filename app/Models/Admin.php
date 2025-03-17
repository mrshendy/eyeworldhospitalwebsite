<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Hash;

class Admin extends Authenticatable
{
    //
    protected $guarded=[];
    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) =>  Hash::make($value),
    //     );
    // }
}
