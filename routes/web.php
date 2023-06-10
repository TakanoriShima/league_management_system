<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController as UserUsersController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\GamesController as UserGamesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Controllers\UserGameController;
use App\Http\Controllers\Admin\UserGameController as AdminUserGameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController as ProfileOfAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/users/{id}/edit', [UserUsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [UserUsersController::class, 'update'])->name('users.update');
    Route::get('/users/{id}', [UserUsersController::class, 'show'])->name('users.show');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/games/{id}', [UserGamesController::class, 'show'])->name('games.show');
    Route::post('/games/{id}/submit', [UserGameController::class, 'store'])->name('game.submit'); 
    
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return redirect('admin/dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
        
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
        Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
        
        Route::get('/games', [GamesController::class, 'index'])->name('games.index');
        Route::get('/games/create', [GamesController::class, 'create'])->name('games.create');
        Route::post('/games/store', [GamesController::class, 'store'])->name('games.store');
        Route::get('/games/{id}', [GamesController::class, 'show'])->name('games.show');
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::put('/games/{id}', [AdminUserGameController::class, 'update'])->name('games.update');
                
    });

    require __DIR__.'/admin.php';
});
