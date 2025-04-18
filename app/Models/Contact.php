<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'whatsapp',
        'email',
        'weekday_open',
        'weekend_open',
    ];
}
