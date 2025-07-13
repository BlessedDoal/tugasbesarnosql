<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Keranjang extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'keranjangs';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'name',
        'price',
        'image',
        'category',
    ];
}