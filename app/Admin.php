<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        public function sendPasswordResetNotification($token)
	    {
	        $this->notify(new AdminPasswordResetNotification($token));
	    }

        protected $fillable = [
            'name',
            'email',
            'password',
            'phone',
            'category',
            'coupon',
            'product',
            'order',
            'blog',
            'newsletter',
            'seo',
            'report',
            'role',
            'return',
            'contact',
            'review',
            'setting',
            'type',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];




}
