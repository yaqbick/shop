<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function hasBook()
    {
        return $this->belongsTo(Book::class);
    }
}
