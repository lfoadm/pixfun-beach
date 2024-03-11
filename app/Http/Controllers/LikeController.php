<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeIt(Post $post)
    {
        $post->like()->create([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unLikeIt(Post $post)
    {
        $post->like()->where('user_id', auth()->id())->first()->delete();
    }
}
