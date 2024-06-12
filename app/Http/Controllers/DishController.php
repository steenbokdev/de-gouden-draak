<?php

namespace App\Http\Controllers;

use App\Enums\Notification;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('dishes.index', [
            'dishes' => $dishes,
            'searchQuery' => $searchQuery,
            'categories' => [
                'collection' => $categories,
                'selected' => $categoryQuery
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $validated = $request->validated();
        Dish::create($validated);

        return redirect()->route('dishes.index');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $validated = $request->validated();

        $dish->update($validated);

        return redirect()->route('dishes.index')->with([
            'notification' => [
                'type' => Notification::Success,
                'body' => __('dish/edit.updated')
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('dishes.index');
    }
}
