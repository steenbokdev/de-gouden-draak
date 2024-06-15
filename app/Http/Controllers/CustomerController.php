<?php

namespace App\Http\Controllers;

use App\Models\Deal;

class CustomerController extends Controller
{
    public function index()
    {
        $deals = Deal::join('dishes', 'deals.dish_id', '=', 'dishes.id')
            ->select('deals.*', 'dishes.name', 'dishes.price as discount_price')
            ->get();

        return view('customer.index', [
            'deals' => $deals
        ]);
    }
}
