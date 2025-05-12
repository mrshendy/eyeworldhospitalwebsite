<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorInsurancePartner extends Model
{
    //
    protected $guarded=[];

    public function partner(){
        return $this->belongsTo(InsurancePartner::class,'partner_id');
    }
}
