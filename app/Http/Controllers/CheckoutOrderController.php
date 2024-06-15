<?php

namespace App\Http\Controllers;

use App\Models\CheckoutOrder;
use App\Models\Dish;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderData = json_decode($request->input('order-data'), true);

        foreach ($orderData as $orderItem) {
            CheckoutOrder::create([
                'dish_id' => $orderItem['dishId'],
                'price' => $orderItem['price'],
                'count' => $orderItem['count'],
            ]);
        }

        return redirect()->back();
    }
}
