<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonInChargeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
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
        Route::post('/update/{uuid}', [AdminController::class, 'update'])->name('admin-management.update');
        Route::delete('/delete/{uuid}', [AdminController::class, 'destroy'])->name('admin-management.destroy');
    });

    // Promo
    Route::group(['prefix' => 'promo'], function() {
        Route::get('/', [PromoController::class, 'index'])->name('promo.index');
        Route::get('/search', [PromoController::class, 'search'])->name('promo.search');
        Route::get('/create', [PromoController::class, 'create'])->name('promo.create');
        Route::post('/store', [PromoController::class, 'store'])->name('promo.store');
        Route::get('/edit/{uuid}', [PromoController::class, 'edit'])->name('promo.edit');
        Route::post('/update/{uuid}', [PromoController::class, 'update'])->name('promo.update');
        Route::delete('/delete/{uuid}', [PromoController::class, 'destroy'])->name('promo.destroy');
    });

    // PIC
    Route::group(['prefix' => 'pic'], function() {
        Route::get('/', [PersonInChargeController::class, 'index'])->name('pic.index');
        Route::get('/search', [PersonInChargeController::class, 'search'])->name('pic.search');
        Route::get('/create', [PersonInChargeController::class, 'create'])->name('pic.create');
        Route::post('/store', [PersonInChargeController::class, 'store'])->name('pic.store');
        Route::get('/edit/{uuid}', [PersonInChargeController::class, 'edit'])->name('pic.edit');
        Route::post('/update/{uuid}', [PersonInChargeController::class, 'update'])->name('pic.update');
        Route::delete('/delete/{uuid}', [PersonInChargeController::class, 'destroy'])->name('pic.destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
