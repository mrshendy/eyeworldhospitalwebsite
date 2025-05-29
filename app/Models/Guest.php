<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $guarded = [];

    public function conferences()
    {
        return $this->belongsToMany(Conference::class)->withPivot([
            'employer', 'doctor_type', 'participation_type', 'attendance_details'
        ])->withTimestamps();
    }

}
