<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
        Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
        
        Route::get('/games', [GamesController::class, 'index'])->name('games.index');
        Route::get('/games/create', [GamesController::class, 'create'])->name('games.create');
        Route::post('/games/store', [GamesController::class, 'store'])->name('games.store');
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    require __DIR__.'/admin.php';
});
