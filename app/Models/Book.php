<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model implements TranslatableContract
{
    //
    use Translatable;
    public $translatedAttributes = ['title','desc'];
    protected $guarded=[];
    protected $hidden = ['translations'];

        protected function img(): Attribute
        {
            return Attribute::make(
                get: fn (?string $value) => asset('uploads/books/' . $value)
            );
        }

        protected function pdfFile(): Attribute
        {
            return Attribute::make(
                get: fn (?string $value) => asset('uploads/files/books/' . $value)
            );
        }

        public function bookTopic()
        {
            return $this->belongsTo(BookTopic::class, 'book_topic_id', 'id');
        }

        public function items()
        {
            return $this->hasMany(CartItem::class);
        }

}


