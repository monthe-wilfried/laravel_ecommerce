<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'payment_type',
        'payment_id',
        'paying_amount',
        'balance_transaction',
        'stripe_order_id',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'month',
        'date',
        'year',
        'tracking_number',
        'return_order'
    ];


}
