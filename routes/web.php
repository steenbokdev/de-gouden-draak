<?php

use App\Http\Controllers\CocktailController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LanguageMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource('cocktail', CocktailController::class)->only(['index']);
    Route::resource('dishes', DishController::class)->except(['show']);
    Route::prefix('dishes')->resource('deals', DealController::class)->only(['index', 'store', 'destroy']);

    Route::post('/download-menu', [DownloadController::class, 'index'])->name('download.menu');

    Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');
});
