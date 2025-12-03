<?php

use App\Http\Controllers\DeveloperController;
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

// routes for game/patch/developer CRUD

// grouping routes that require admin authentication
Route::middleware(['auth', 'can:manage-game'])->group(function () {
    // games
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');

    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

    // patches
    Route::resource('patches', PatchController::class)->except(['update', 'destroy']);

    // developers
    Route::resource('developers', DeveloperController::class)->except(['index', 'show']);
});

// public routes for games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

// public routes for patches
// update and destroy permissions handled in controller to allow users to edit/delete their own patches
Route::middleware(['auth'])->group(function () {
    Route::put(
        '/games/{game}/patches/{patch}',
        [PatchController::class, 'update']
    )->name('patches.update');
    Route::delete(
        '/games/{game}/patches/{patch}',
        [PatchController::class, 'destroy']
    )->name('patches.destroy');
});

// public routes for devs
Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
Route::get('/developers/{developer}', [DeveloperController::class, 'show'])->name('developers.show');

require __DIR__ . '/auth.php';
