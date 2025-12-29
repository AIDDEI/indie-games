<?php

use App\Http\Controllers\Admin\AdminGameController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::aliasMiddleware('admin', AdminMiddleware::class);

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
    Route::resource('games', GameController::class)->except(['index', 'show']);
    Route::get('/games/my-games', [GameController::class, 'myGames'])->name('games.my-games');
    Route::post('/games/{game}/favorite', [FavoriteController::class, 'toggle'])->name('games.favorite.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/games', [AdminGameController::class, 'index'])->name('games.index');
    Route::delete('games/{game}', [AdminGameController::class, 'destroy'])->name('games.destroy');
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

Route::resource('games', GameController::class)->only(['index', 'show']);

require __DIR__ . '/auth.php';
