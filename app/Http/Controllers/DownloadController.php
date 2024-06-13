<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DownloadController extends Controller
{
    public function index()
    {
        $dishes = Dish::all()->whereNotNull('price')->sortBy(['menu_number', 'menu_addition'])->groupBy('category');
        $discounts = Deal::join('dishes', 'deals.dish_id', '=', 'dishes.id')->select(['dishes.*', 'deals.price as discount_price'])->get();

        $dishes = $dishes->map(function ($category) {
            return $category->map(function ($dish) {
                if (empty($dish->menu_number)) {
                    $dish->menu_number = 'N/A';
                }
                if (empty($dish->menu_addition)) {
                    $dish->menu_addition = '';
                }
                return $dish;
            });
        })->toArray();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('menu_pdf', ['dishes' => $dishes, 'discounts' => $discounts])->render());
        return $pdf->stream();
    }
}
