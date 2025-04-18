<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamTestimonial extends Model
{
    protected $fillable = [
        'name',
        'position',
        'message',
        'image',
    ];
}
