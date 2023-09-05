<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment_method';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'account_number',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
