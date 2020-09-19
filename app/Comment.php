<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function hasBook()
    {
        return $this->belongsTo(Book::class);
    }
}
