<?php

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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/client-cars', function () {
    return view('client-cars');
})->middleware(['auth', 'verified'])->name('client_cars');

Route::get('/sparepart', function () {
    return view('sparepart');
})->middleware(['auth', 'verified'])->name('sparepart');

Route::get('/service', function () {
    return view('service');
})->middleware(['auth', 'verified'])->name('service');

Route::get('/user-managemnt', function () {
    return view('user_management');
})->middleware(['auth', 'verified'])->name('user_management');

Route::get('/suggestion', function () {
    return view('suggestion');
})->middleware(['auth', 'verified'])->name('suggestion');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
