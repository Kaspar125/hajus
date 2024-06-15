<?php

use App\Http\Controllers\MyFavoriteSubjectController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::post('my-favorite-subjects', [MyFavoriteSubjectController::class, 'store'])
    ->name('api.subject.store');

Route::apiResource('product', ProductsController::class);