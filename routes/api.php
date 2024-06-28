<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralController;
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
    });

    // Promos
    Route::get('/promos', [GeneralController::class, 'promos'])->name('api.promos');
});
