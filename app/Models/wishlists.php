<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wishlists extends Model
{
    protected $Fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_image',
        'price',
        'status',


    ];
}
