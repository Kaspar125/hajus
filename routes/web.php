<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MarkerController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
