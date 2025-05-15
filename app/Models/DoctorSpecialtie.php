<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialtie extends Model
{
    //
    protected $guarded=[];

    public function specialtie(){
        return $this->belongsTo(Specialtie::class);
    }
}
