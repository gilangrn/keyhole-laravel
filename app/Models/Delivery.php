<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery_type';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'shipping_cost',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
