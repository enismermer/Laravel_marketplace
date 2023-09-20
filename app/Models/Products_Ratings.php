<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products_Ratings extends Model
{
    use HasFactory;

    protected $table = 'products_ratings';
    protected $fillable = [
        'rating',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id', 'id', 'products');
    }
}
