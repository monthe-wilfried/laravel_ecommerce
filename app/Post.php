<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'post_category_id',
        'title_en',
        'title_de',
        'details_en',
        'details_de',
        'image'
    ];

    public function post_category(){
        return $this->belongsTo('App\PostCategory');
    }
}
