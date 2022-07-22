<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\PostController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categorias', CategoriasController::class)->names('admin.categorias');

Route::resource('post', PostController::class)->names('admin.posts');

