<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'id',
        'title',
        'short_description',
        'description',
        'image',
        'author',
        'category',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
