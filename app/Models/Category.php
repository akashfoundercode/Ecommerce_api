<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $Fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
    ];
}
