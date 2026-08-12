<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_variant extends Model
{
    protected $Fillable = [
        'product_id',
        'color',
        'size',
        'stock',
        'price',
        'status',
        

    ];
}
