<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogCarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonInChargeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SparePartController;
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
    Route::get('/get-data-line', [DashboardController::class, 'getDataLine'])->name('dashboard.data-line');

    // Admin Management
    Route::group(['prefix' => 'admin-management'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin-management.index');
        Route::get('/search', [AdminController::class, 'search'])->name('admin-management.search');
        Route::get('/create', [AdminController::class, 'create'])->name('admin-management.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin-management.store');
        Route::get('/edit/{uuid}', [AdminController::class, 'edit'])->name('admin-management.edit');
        Route::post('/update/{uuid}', [AdminController::class, 'update'])->name('admin-management.update');
        Route::delete('/delete/{uuid}', [AdminController::class, 'destroy'])->name('admin-management.destroy');
    });

    // Promo
    Route::group(['prefix' => 'promo'], function () {
        Route::get('/', [PromoController::class, 'index'])->name('promo.index');
        Route::get('/search', [PromoController::class, 'search'])->name('promo.search');
        Route::get('/create', [PromoController::class, 'create'])->name('promo.create');
        Route::post('/store', [PromoController::class, 'store'])->name('promo.store');
        Route::get('/edit/{uuid}', [PromoController::class, 'edit'])->name('promo.edit');
        Route::post('/update/{uuid}', [PromoController::class, 'update'])->name('promo.update');
        Route::delete('/delete/{uuid}', [PromoController::class, 'destroy'])->name('promo.destroy');
    });

    // PIC
    Route::group(['prefix' => 'pic'], function () {
        Route::get('/', [PersonInChargeController::class, 'index'])->name('pic.index');
        Route::get('/search', [PersonInChargeController::class, 'search'])->name('pic.search');
        Route::get('/create', [PersonInChargeController::class, 'create'])->name('pic.create');
        Route::post('/store', [PersonInChargeController::class, 'store'])->name('pic.store');
        Route::get('/edit/{uuid}', [PersonInChargeController::class, 'edit'])->name('pic.edit');
        Route::post('/update/{uuid}', [PersonInChargeController::class, 'update'])->name('pic.update');
        Route::delete('/delete/{uuid}', [PersonInChargeController::class, 'destroy'])->name('pic.destroy');
    });

    // Sales
    Route::group(['prefix' => 'sales'], function () {
        Route::get('/', [SalesController::class, 'index'])->name('sales.index');
        Route::get('/search', [SalesController::class, 'search'])->name('sales.search');
        Route::get('/create', [SalesController::class, 'create'])->name('sales.create');
        Route::post('/store', [SalesController::class, 'store'])->name('sales.store');
        Route::get('/{uuid}', [SalesController::class, 'detail'])->name('sales.detail');
        Route::get('/edit/{uuid}', [SalesController::class, 'edit'])->name('sales.edit');
        Route::post('/update/{uuid}', [SalesController::class, 'update'])->name('sales.update');
        Route::delete('/delete/{uuid}', [SalesController::class, 'destroy'])->name('sales.destroy');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customer
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/search', [CustomerController::class, 'search'])->name('customer.search');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{uuid}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{uuid}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/delete/{uuid}', [CustomerController::class, 'destroy'])->name('customer.destroy');
        Route::get('/{uuid}', [CustomerController::class, 'detail'])->name('customer.detail');
        Route::get('/car/create{uuid}', [CustomerController::class, 'createCar'])->name('car.create');
        Route::post('/car/store/{uuid}', [CustomerController::class, 'storeCar'])->name('car.store');
        Route::delete('/car/delete/{uuid}', [CustomerController::class, 'destroyCar'])->name('car.destroy');
        Route::get('/car/edit/{uuid}', [CustomerController::class, 'editCar'])->name('car.edit');
        Route::post('/car/update/{uuid}', [CustomerController::class, 'updateCar'])->name('car.update');
    });

    // Service
    Route::group(['prefix' => 'service'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/search', [ServiceController::class, 'search'])->name('service.search');
        Route::get('/detail/{uuid}', [ServiceController::class, 'detail'])->name('service.detail');
        Route::get('/edit/{uuid}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update/{uuid}', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('/delete/{uuid}', [ServiceController::class, 'destroy'])->name('service.delete');
    });

    // Spare part
    Route::group(['prefix' => 'sparepart'], function () {
        Route::get('/', [SparePartController::class, 'index'])->name('sparepart.index');
        Route::get('/search', [SparePartController::class, 'search'])->name('sparepart.search');
        Route::get('/create', [SparePartController::class, 'create'])->name('sparepart.create');
        Route::post('/store', [SparePartController::class, 'store'])->name('sparepart.store');
        Route::get('/detail/{uuid}', [SparePartController::class, 'detail'])->name('sparepart.detail');
        Route::get('/edit/{uuid}', [SparePartController::class, 'edit'])->name('sparepart.edit');
        Route::post('/update/{uuid}', [SparePartController::class, 'update'])->name('sparepart.update');
        Route::delete('/delete/{uuid}', [SparePartController::class, 'destroy'])->name('sparepart.destroy');
    });

    // Car Catalog
    Route::group(['prefix' => 'car-catalog'], function () {
        Route::get('/', [CatalogCarController::class, 'index'])->name('catalog.index');
        Route::get('/search', [CatalogCarController::class, 'search'])->name('catalog.search');
        Route::get('/create', [CatalogCarController::class, 'create'])->name('catalog.create');
        Route::post('/store', [CatalogCarController::class, 'store'])->name('catalog.store');
        Route::get('/detail/{uuid}', [CatalogCarController::class, 'detail'])->name('catalog.detail');
        Route::get('/edit/{uuid}', [CatalogCarController::class, 'edit'])->name('catalog.edit');
        Route::post('/update/{uuid}', [CatalogCarController::class, 'update'])->name('catalog.update');
        Route::delete('/delete/{uuid}', [CatalogCarController::class, 'destroy'])->name('catalog.destroy');
    });
});

require __DIR__ . '/auth.php';
