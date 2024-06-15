<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Dish;
use App\Models\TabletOrder;
use App\Models\TabletOrderLines;
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
            ],
            'round' => $this->getRound($this->getTabletId())
        ]);
    }

    private function getTabletId()
    {
        return str_replace('tablet_', '', auth()->user()->employee_id);
    }

    private function getRound($tablet_id)
    {
        return TabletOrder::where('tablet_id', $tablet_id)
            ->whereDate('order_time', today())
            ->max('round') ?? 1;
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        $tablet_id = $this->getTabletId();
        $round = TabletOrder::where('tablet_id', $tablet_id)
                ->whereDate('order_time', today())
                ->max('round') + 1;

        // TODO: Check round for the day

        $order = TabletOrder::create([
            'tablet_id' => $tablet_id,
            'round' => $round ?? 1,
            'order_time' => now()
        ]);

        foreach ($validated['dishes'] as $dish) {
            $dishObject = Json_decode($dish);
            $dishModel = Dish::find($dishObject->dish);
            $price = $dishModel->deals()->get()->isEmpty() ? $dishModel->price : $dishModel->deals()->first()->price;

            TabletOrderLines::create([
                'tablet_order_id' => $order->id,
                'dish_id' => $dishObject->dish,
                'quantity' => $dishObject->amount,
                'price' => $price
            ]);
        }

        return redirect()->route('order.index');
    }
}
