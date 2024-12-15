<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'banner',
        'address',
        'state',
        'city',
        'postcode',
        'phone',
    ];
}
