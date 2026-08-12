<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'address_id',
        'subtotal',
        'discount',
        'delivery_charge',
        'total_amount',
        'coupon_id',
        'coupon_code',
        'payment_method',
        'payment_status',
        'order_status',
        'status',
        'address',
        'phone'
        ];
}
