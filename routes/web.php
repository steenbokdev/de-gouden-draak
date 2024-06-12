<?php

use App\Http\Controllers\CocktailController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DishController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('cocktail', CocktailController::class)->only(['index']);
Route::resource('dishes', DishController::class)->except(['show']);
Route::prefix('dishes')->resource('deals', DealController::class)->only(['index', 'store', 'destroy']);
