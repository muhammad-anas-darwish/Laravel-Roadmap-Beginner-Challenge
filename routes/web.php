<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('tags', TagController::class)
        ->except(['show']);
    Route::resource('articles', ArticleController::class)
        ->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/articles/all', [ArticleController::class, 'get_all'])->name('articles.get_all');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

require __DIR__ . '/auth.php';
