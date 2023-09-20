<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addresses extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'address_line1', 
        'address_line2', 
        'city', 
        'postal_code', 
        'country',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id', 'users');
    }
}
