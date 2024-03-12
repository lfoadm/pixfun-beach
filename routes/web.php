<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/user', function () {
    return Inertia::render('User');
});


Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/update-image', [UserController::class, 'updateImage'])->name('user.updateImage');
    Route::post('/user/update-image-cover', [UserController::class, 'updateImageCover'])->name('user.updateImageCover');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('like/{post}', [LikeController::class, 'likeIt']);
    Route::delete('like/{post}', [LikeController::class, 'unLikeIt']);
});

require __DIR__.'/auth.php';
