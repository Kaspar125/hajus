<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductsController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::group(['prefix' => 'markers'], function () {
    Route::get('/', [MarkerController::class, 'index'])->name('markers.index');
    Route::get('/create', [MarkerController::class, 'create'])->name('markers.create');
    Route::post('/', [MarkerController::class, 'store'])->name('markers.store');
    Route::get('/{id}/edit', [MarkerController::class, 'edit'])->name('markers.edit');
    Route::put('/{id}', [MarkerController::class, 'update'])->name('markers.update');
    Route::delete('/{id}', [MarkerController::class, 'destroy'])->name('markers.destroy');
});

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
 
Route::get('shop', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
