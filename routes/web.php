<?php


use App\Livewire\EditPost;
use App\Livewire\CreatePost;
use App\Livewire\BlogPostList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', BlogPostList::class)->name('posts.index');
Route::get('/posts/create', CreatePost::class)->name('posts.create');
