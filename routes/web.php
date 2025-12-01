<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatchController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes for game CRUD

// grouping routes that require admin authentication
Route::middleware(['auth', 'can:manage-game'])->group(function () {
    // games
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');

    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

    // patches
    Route::post('games/{game}/patches', [PatchController::class, 'store'])->name('patches.store');
});

// public routes
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');


// routes for patches
Route::resource('patches', PatchController::class);

require __DIR__ . '/auth.php';
