<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'vat',
        'shipping_cost',
        'shopname',
        'email',
        'phone',
        'address',
        'logo'
    ];
}
