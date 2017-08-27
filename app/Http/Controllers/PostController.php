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
            return response()->json([
                'code' =>  401,
                'error' => 'Unauthorized',
                'message' => 'Token not found on request',
            ]);
        }

        $user = User::where('remember_token', $token)->get()->first();
        
        if ($post->userCanWriteComment($user)) {
            $post->comments()->create([
                'user_id' => $user->id,
                'text' => $request->get('comment')
            ]);

            $post->writer->notifications()
                ->create([
                    'message' => "{$user->name} wrote a comment on your post {$post->title}"
                ]);

            return response()->json([
                'code' => 200,
                'message' => 'Ok!'
            ]);
        }

        return response()->json([
            'code' => 403,
            'error' => 'Forbidden',
            'message' => "User can't write comments",
        ]);
    }
}
