<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $Fillable = [
        'category_id',
        'sub_category_name',
        'slug',
        'image',
        'description',  
        'status',
    ];
}
