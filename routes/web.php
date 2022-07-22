<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

Route::get('/', [PostsController::class, 'index'])->name('post.index');

Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');


Route::get('categorias/{categorias}', [PostsController::class, 'categorias'])->name('posts.categorias');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
