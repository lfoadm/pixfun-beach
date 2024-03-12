<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllPostsCollection;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageCoverService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image as ResizeImage;

class UserController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return Inertia::render('User', [
            'posts' => new AllPostsCollection($posts)
        ]);
    }

    public function show(int $id)
    {
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return Inertia::render('User', [
            'user' => User::find($id),
            'posts' => new AllPostsCollection($posts)
        ]);
    }

    public function updateImage(Request $request)
    {
        $request->validate([ 'image' => 'required|mimes:jpg,jpeg,png' ]);
        $user = (new ImageService)->updateImage(auth()->user(), $request);
        $user->save();
    }

    public function updateImageCover(Request $request)
    {
        $request->validate([ 'imageCover' => 'required|mimes:jpg,jpeg,png' ]);
        $user = (new ImageCoverService)->updateImage(auth()->user(), $request);
        $user->save();
    }
}