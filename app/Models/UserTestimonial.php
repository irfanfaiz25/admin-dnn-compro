<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTestimonial extends Model
{
    protected $fillable = [
        'name',
        'city',
        'testimonial',
    ];
}
