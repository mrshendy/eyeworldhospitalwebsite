<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    //
    protected $guarded=[];

    public function day(){
        return $this->belongsTo(Day::class);
    }
}
