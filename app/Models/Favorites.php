<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id', 'users');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id', 'id', 'products');
    }
}
