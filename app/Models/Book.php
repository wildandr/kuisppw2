<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The authors that belong to the book.
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class, 'favourite_books');
    }
}
