<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    protected $fillable = [
        'category_name_en', 'category_name_de'
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
