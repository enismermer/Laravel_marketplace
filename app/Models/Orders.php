<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id', 'users');
    }
}
