<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'description',
        'delivery_option',
        'total_amount',
        'token',
        'status',
        'is_completed',
    ];
}

