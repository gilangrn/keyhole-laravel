<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'category_id',
        'stock',
        'price',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
