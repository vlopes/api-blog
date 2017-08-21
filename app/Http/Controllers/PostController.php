<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function writeComment(Request $request, Post $post)
    {
        $token = $request->get('token');

        if (!$token) {
            //sem usuario
        }

        //verificar o tempo do comentario anterior

        $user = User::where('remember_token', $token)->get()->first();

        if ($post->userCanWriteComment($user)) {
            $post->comments()->create([
                'user_id' => $user->id,
                'text' => $request->get('comment')
            ]);
        }

        //nao pode escrever comentario
    }
}
