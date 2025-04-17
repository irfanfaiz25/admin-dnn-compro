<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    protected $fillable = [
        'content',
        'order_number',
    ];
}
