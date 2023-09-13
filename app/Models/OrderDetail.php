<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'qty',
        'amount',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
