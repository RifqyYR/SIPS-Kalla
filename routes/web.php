<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get-data-pie', [DashboardController::class, 'getDataPie'])->name('dashboard.data-pie');
    
    // Admin Management
    Route::group(['prefix' => 'admin-management'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin-management.index');
        Route::get('/search', [AdminController::class, 'search'])->name('admin-management.search');
        Route::get('/create', [AdminController::class, 'create'])->name('admin-management.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin-management.store');
        Route::get('/edit/{uuid}', [AdminController::class, 'edit'])->name('admin-management.edit');
        Route::post('/update', [AdminController::class, 'update'])->name('admin-management.update');
        Route::get('/delete/{uuid}', [AdminController::class, 'destroy'])->name('admin-management.destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
