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

    Route::prefix('download-menu')->name('download.menu.')->group(function () {
        Route::post('/', [DownloadController::class, 'index'])->name('index');
        Route::get('/show', [DownloadController::class, 'show'])->name('show');
    });

    Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/index', function () {
            return view('customer.index');
        })->name('index');
        Route::get('/contact', function () {
            return view('customer.contact');
        })->name('contact');
        Route::get('/contact-new', function () {
            return view('customer.contact-new');
        })->name('contact.new');
        Route::get('/menu', function () {
            return view('customer.menu');
        })->name('menu');
        Route::get('/news', function () {
            return view('customer.news');
        })->name('news');
    });
});
