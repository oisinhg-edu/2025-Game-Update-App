<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'welcome'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes for game CRUD

// grouping routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create'); 
    Route::post('/games', [GameController::class, 'store'])->name('games.store');

    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');
});

// public routes
Route::get('/games', [GameController::class, 'index'])->name('games.index'); 
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

require __DIR__ . '/auth.php';
