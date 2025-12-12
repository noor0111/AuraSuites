<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', 
        'price',
        'capacity',
        'size',
        'bed_type',
        'amenities',
        'image_url',
        'is_available'
    ];

    protected $casts = [
        'amenities' => 'array',
        'is_available' => 'boolean',
        'price' => 'decimal:2'
    ];
}