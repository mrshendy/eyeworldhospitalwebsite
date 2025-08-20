<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $guarded=[];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    public function expatVisitDetails()
    {
        return $this->hasOne(ExpatVisitDetailsReservation::class);
    }
}
