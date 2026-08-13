<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_variant extends Model
{
    protected $fillable = [
        'product_id',
        'color',
        'size',
        'stock',
        'price',
        'status',
    ];
}
