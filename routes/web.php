<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = [];
    // $posts = Post::all();
    // $posts = Post::where('user_id', auth()->id())->get();
    if (auth()->check()) {
        $posts = auth()->user()->userMadePosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

// User Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Post Routes
Route::post('/create-post', [PostController::class, 'createPost']);
