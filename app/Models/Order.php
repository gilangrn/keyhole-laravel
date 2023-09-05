<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'id',
        'order_date',
        'payment_method_id',
        'delivery_type_id',
        'user_id',
        'user_address_id',
        'total_product_price',
        'delivery_price',
        'service_price',
        'total_amount',
        'status',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
