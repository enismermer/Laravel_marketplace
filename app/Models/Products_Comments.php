<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products_Comments extends Model
{
    use HasFactory;

    protected $table = 'products_comments';
    protected $fillable = [
        'comment',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'products_id', 'id', 'products');
    }
}
