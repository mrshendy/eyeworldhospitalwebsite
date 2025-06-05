<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceImage extends Model
{
    protected $fillable = ['conference_id', 'image'];

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => asset('uploads/conferences/' . $value)
        );
    }
}
