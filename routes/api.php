<?php

use App\Http\Controllers\MyFavoriteSubjectController;
use Illuminate\Support\Facades\Route;

Route::post('my-favorite-subjects', [MyFavoriteSubjectController::class, 'store'])
    ->name('api.subject.store');