<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [

        'name',
        'category_id',
        'slug',
        'description',
        'price',
        'stock',
        'is_active',
        'images',
        'weight',
        'height',
        'width',
        'length',
    ];
    protected $casts = [
        'images' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
