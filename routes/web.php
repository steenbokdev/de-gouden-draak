<?php

use App\Http\Controllers\CocktailController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LanguageMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('cocktail', CocktailController::class)->only(['index']);

    Route::post('/download-menu', [DownloadController::class, 'index'])->name('download.menu');

    Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');

    Route::middleware('auth')->group(function () {
        Route::resource('dishes', DishController::class)->except(['show']);
        Route::prefix('dishes')->resource('deals', DealController::class)->only(['index', 'store', 'destroy']);
    });
});
