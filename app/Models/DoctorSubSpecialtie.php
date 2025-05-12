<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSubSpecialtie extends Model
{
    //
    protected $guarded=[];

    public function subSpecialtie(){
        return $this->belongsTo(SubSpecialtie::class);
    }
}
