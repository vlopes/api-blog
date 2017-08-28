<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function recentNotifications()
    {
        return $this
            ->notifications()
            ->where('read_at', '>', Carbon::now()->subHours(1))
            ->orWhereNull('read_at')
            ->get();
    }
}
