<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function posts() // membantu untuk mengetahui jumlah post berdasarkan kategori
    {
        return $this->hasMany(Post::class);
    }

}
