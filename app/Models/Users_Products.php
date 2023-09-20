<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users_Products extends Model
{
    use HasFactory;

    protected $table = 'users_products';

    public function user(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'users_id', 'id', 'users');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'products_id', 'id', 'products');
    }
}
