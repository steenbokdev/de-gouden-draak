<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Dish;
use Illuminate\Support\Facades\App;

class DownloadController extends Controller
{
    public function index()
    {
        $pdf = $this->makePdf();
        return $pdf->download('menu-de-gouden-draak-' . date('Ymd') . '.pdf');
    }

    public function show()
    {
        $pdf = $this->makePdf();
        return $pdf->stream();
    }

    private function makePdf()
    {
        $dishes = Dish::all()->whereNotNull('price')->sortBy(['menu_number', 'menu_addition'])->groupBy('category');
        $discounts = Deal::join('dishes', 'deals.dish_id', '=', 'dishes.id')->select(['dishes.*', 'deals.price as discount_price'])->get();

        $dishes = $dishes->map(function ($category) {
            return $category->map(function ($dish) {
                if (empty($dish->menu_number)) {
                    $dish->menu_number = 'N/A';
                }
                return $dish;
            });
        })->toArray();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('menu_pdf', ['dishes' => $dishes, 'discounts' => $discounts])->render());

        return $pdf;
    }
}
