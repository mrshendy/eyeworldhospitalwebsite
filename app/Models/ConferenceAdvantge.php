<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ConferenceAdvantge extends Model
{
    //
    use Translatable;
    protected $guarded=[];
    protected $hidden = ['translations'];
    public $translatedAttributes = ['advantage_title', 'advantage_description'];
    protected $translationForeignKey = 'conference_advantge_id';

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }
}


