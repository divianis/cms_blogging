<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    // Define relationship with table 'posts'
    public function posts()
    {
        return $this->belongsToMany(Post::class); // many to many relationship, 1 post bisa banyak tag & 1 tag bisa banyak post
    }
}
