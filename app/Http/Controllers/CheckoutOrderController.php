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
        $dishes = Dish::whereNotNull('dishes.price')
            ->leftJoin('deals', 'dishes.id', '=', 'deals.dish_id')
            ->select('dishes.*', 'deals.price as discount_price')
            ->orderBy('menu_number')
            ->orderBy('menu_addition')
            ->get();

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
                'price_per_item' => $orderItem['price'],
                'item_count' => $orderItem['count'],
            ]);
        }

        return redirect()->back();
    }
}
