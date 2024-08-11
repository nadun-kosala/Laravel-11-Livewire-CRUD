<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Post;
use App\Livewire\Test;
use App\Livewire\ViewPost;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/posts', Post::class)->name('posts');
    Route::get('/view-post/{id}', ViewPost::class)->name('view.posts');
});


Route::get('/test', Test::class)->name('test');
