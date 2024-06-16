<?php

use App\Http\Controllers\CheckoutOrderController;
use App\Http\Controllers\CocktailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Middleware\EmployeeUserMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\TabletUserMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LanguageMiddleware::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('login-tablet', [LoginController::class, 'loginTablet'])->name('login-tablet');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('authenticate-tablet', [LoginController::class, 'authenticateTablet'])->name('authenticate-tablet');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('cocktail', CocktailController::class)->only(['index']);

    Route::prefix('download-menu')->name('download.menu.')->group(function () {
        Route::post('/', [DownloadController::class, 'index'])->name('index');
        Route::get('/show', [DownloadController::class, 'show'])->name('show');
    });

    Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('index');
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

    Route::middleware(TabletUserMiddleware::class)->group(function () {
        Route::prefix('orders')->resource('order', CustomerOrderController::class)->only(['index', 'store']);
    });

    Route::middleware(EmployeeUserMiddleware::class)->group(function () {
        Route::resource('dishes', DishController::class)->except(['show']);
        Route::resource('checkout', CheckoutOrderController::class)->only(['index', 'store']);
        Route::resource('sales', SalesController::class)->only(['index']);
        Route::post('sales/download', [SalesController::class, 'download'])->name('sales.download');
        Route::prefix('dishes')->resource('deals', DealController::class)->only(['index', 'store', 'destroy']);
    });
});
