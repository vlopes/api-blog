<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'premium',
        'featured',
    ];

    public function isPremium()
    {
        return $this->premium;
    }

    public function isFeatured()
    {
        return $this->featured;
    }
}
