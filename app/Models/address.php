<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable =[
        'user_id',
        'full_name',
        'mobile',
        'address',
        'landmark',
        'city',
        'state',
        'country',
        'pincode',
        'address_type',        
    ];
}
