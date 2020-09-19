<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function hasPublisher()
    {
        return $this->hasOne(Publisher::class);
    }

    public function hasCategory()
    {
        return $this->hasMany(Category::class);
    }

    public function hasAuthor()
    {
        return $this->belongsToMany(Author::class, 'author_books');
    }

    public function hasOrderItem()
    {
        return $this->belongsToMany(OrderItem::class);
    }

    public function hasComment()
    {
        return $this->hasMany(Comment::class);
    }
}
