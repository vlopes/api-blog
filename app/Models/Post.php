<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use Carbon\Carbon;

class Post extends Model
{
    public function writer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userCanWriteComment(User $user)
    {
        $timePassed = !$user->comments()->where('created_at', '>', Carbon::now()->subMinutes(2))->count();

        return ($user->isPremium() || $user->isFeatured()) && $timePassed;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
