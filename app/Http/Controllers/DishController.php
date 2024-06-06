<?php

namespace App\Http\Controllers;

use App\Enums\Notification;
use App\Http\Requests\UpdateDishRequest;
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
}
