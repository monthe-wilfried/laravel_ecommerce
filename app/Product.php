<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'product_name',
        'product_details',
        'product_code',
        'product_quantity',
        'product_color',
        'product_size',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status'
    ];
}
