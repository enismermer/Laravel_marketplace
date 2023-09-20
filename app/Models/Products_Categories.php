<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products_Categories extends Model
{
    use HasFactory;

    protected $table = 'products_categories';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id', 'categories');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id', 'id', 'products');
    }
}
