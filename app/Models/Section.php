<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'image_url',
        'section_name',
    ];
}
