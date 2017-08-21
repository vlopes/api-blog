<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    public function writer()
    {
        return $this->hasOne(User::class);
    }

    public function userCanWriteComment(User $user)
    {
        if ($user->isPremium() || $user->isFeatured()) {
            return true;
        };

        return false;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
