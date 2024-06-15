<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class CheckoutOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all()->whereNotNull('price')->sortBy(['menu_number', 'menu_addition']);

        return view('order.checkout.index', [
            'dishes' => $dishes
        ]);
    }
}
