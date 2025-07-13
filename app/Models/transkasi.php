<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Transkasi extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'transkasis';
    protected $fillable = [
        'user_id',
        'items',
        'subtotal',
        'metode',
        'bukti',
        'status',
    ];
    protected $casts = [
        'items' => 'array',
    ];
}