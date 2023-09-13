<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_detail';

    protected $fillable = [
        'id',
        'cart_id',
        'product_id',
        'qty',
        'total_amount',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
