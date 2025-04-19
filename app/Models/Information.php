<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'name',
        'label',
        'value',
        'image_url',
    ];
}
