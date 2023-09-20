<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders_Products extends Model
{
    use HasFactory;

    protected $table = 'orders_products';

    public function order(): BelongsTo
    {
        return $this->belongsTo(Orders::class, 'orders_id', 'id', 'orders');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id', 'id', 'products');
    }
}
