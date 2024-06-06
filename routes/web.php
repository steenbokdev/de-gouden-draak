<?php

use App\Http\Controllers\CocktailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('cocktail', CocktailController::class)->only(['index']);
