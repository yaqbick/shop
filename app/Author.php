<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function hasBook()
    {
        return $this->belongsToMany(Book::class, 'author_books');
    }
}
