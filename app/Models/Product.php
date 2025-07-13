<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category',
        'price',
        'stock',
        'description',
        'image',
        'status',
    ];
} 