<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceGuest extends Model
{
    //
    protected $guarded = [];
    protected $table = 'conference_guest';

    public function Guest()
    {
        return $this->belongsTo('App\Models\Guest', 'guest_id');
    }
}
