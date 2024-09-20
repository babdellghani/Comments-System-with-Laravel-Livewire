<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Articles;
use App\Livewire\Episodes;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/articles', Articles::class)->name('articles.index');
    Route::get('/episodes', Episodes::class)->name('episodes.index');

    Route::get('/articles/{article:slug}', ArticleController::class)->name('article.show');
    Route::get('/episodes/{episode:slug}', EpisodeController::class)->name('episode.show');
});

require __DIR__.'/auth.php';