<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'date',
    ];

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
}
