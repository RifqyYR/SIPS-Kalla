<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatalogCarController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SuggestionController;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout')->middleware('auth:sanctum');
    
    Route::middleware('auth:sanctum')->group(function () {
        // Suggestion
        Route::group(['prefix' => 'suggestion'], function() {
            Route::post('/create', [SuggestionController::class, 'create'])->name('api.suggestion.create');
            Route::get('/get-suggestion', [SuggestionController::class, 'getUserSuggestions'])->name('api.suggestion.get');
        });

        // Client
        Route::get('/client/vehicle', [ClientController::class, 'getClientCars'])->name('api.client.cars');

        // Service
        Route::group(['prefix' => 'service'], function() {
            Route::post('booking', [ServiceController::class, 'bookingService'])->name('api.service.booking');
            Route::post('visit-service', [ServiceController::class, 'visitService'])->name('api.service.visit');
        });
    });

    // Promos
    Route::get('/promos', [GeneralController::class, 'promos'])->name('api.promos');

    // Sales
    Route::get('/sales', [GeneralController::class, 'sales'])->name('api.sales');
    Route::get('/sales/{id}', [GeneralController::class, 'detailSales'])->name('api.detail-sales');

    // PIC
    Route::get('/pic', [GeneralController::class, 'pic'])->name('api.pic');

    // Catalog Car
    Route::get('/used-car', [CatalogCarController::class, 'getUsedCars'])->name('api.catalog-cars.used');
    Route::get('/new-car', [CatalogCarController::class, 'getNewCars'])->name('api.catalog-cars.new');
});
