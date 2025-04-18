<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'series',
        'stock',
        'description',
        'racikan',
        'karakter',
        'rempah',
        'kemasan',
        'detailImage',
        'packImage',
    ];
}
