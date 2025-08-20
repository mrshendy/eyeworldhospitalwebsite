<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpatVisitDetailsReservation extends Model
{

    protected $table = 'expat_visit_details_reservation';

    protected $guarded = [];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

}
