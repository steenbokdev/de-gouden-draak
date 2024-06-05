<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::sortable()->paginate(10);

        return view('dishes.index', [
            'dishes' => $dishes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('dishes.edit', [
            'dish' => $dish
        ]);
    }
}
