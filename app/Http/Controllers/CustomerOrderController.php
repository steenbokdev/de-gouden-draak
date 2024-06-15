<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $searchQuery = request()->input('search');
        $categoryQuery = request()->input('category');

        $dishes = Dish::sortable();

        $dishes->leftJoin('deals', 'dishes.id', '=', 'deals.dish_id')->select('dishes.*', 'deals.price as discount_price');

        $categories = Dish::whereNotNull('category')->distinct()->pluck('category')->unique();

        if (isset($categoryQuery)) {
            $dishes = $dishes->where('category', $categoryQuery);
        }

        if (isset($searchQuery)) {
            $dishes = $dishes->where('name', 'like', "%$searchQuery%")
                ->orWhere('menu_number', 'like', "%$searchQuery%");
        }

        $dishes = $dishes->paginate(35);

        return view('customer.order', [
            'dishes' => $dishes,
            'searchQuery' => $searchQuery,
            'categories' => [
                'collection' => $categories,
                'selected' => $categoryQuery
            ]
        ]);
    }

    public function store()
    {
        //
    }
}
