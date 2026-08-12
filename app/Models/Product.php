<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'product_name',
        'price', 
        'description', 
        'image',
        'image_url',
        'slug',
        'sku',
        'short_description',
        'specification',
        'selling_price',
        'discount',
        'stock',
        'thumbnail',
        'status',
        'category_id', 
        'brand_id', 
        'sub_category_id'
    ];
}
