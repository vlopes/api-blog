<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'text',
    ];

    public function writer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
