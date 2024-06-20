<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDealRequest;
use App\Models\Deal;
use App\Models\Dish;
use DateTime;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::paginate(8);
        $dealDishIds = $deals->pluck('dish_id')->toArray();
        $dishes = Dish::whereNotIn('id', $dealDishIds)->whereNotNull('price')->get();
        $date = $this->get_next_week();

        return view('dishes.deals', [
            'deals' => $deals,
            'dishes' => $dishes,
            'date' => $date
        ]);
    }

    /**
     * Store the specified resource in storage.
     */
    public function store(StoreDealRequest $request)
    {
        $validated = $request->validated();
        Deal::create($validated);

        return redirect()->route('deals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();

        return redirect()->route('deals.index');
    }

    /**
     * Get the upcoming week number with the corresponding year.
     */
    private function get_next_week()
    {
        $date = new DateTime();
        $date->modify('+1 week');
        $date = $date->format('W Y');

        return $date;
    }
}
