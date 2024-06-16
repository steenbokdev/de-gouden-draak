<?php

namespace App\Http\Controllers;

use App\Enums\Notification;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Dish;
use App\Models\Round;
use App\Models\TabletOrder;
use App\Models\TabletOrderLines;
use DateTime;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    const MAX_ROUNDS = 5;
    const MIN_ORDER_INTERVAL = 10;

    public function index()
    {
        $dishes = Dish::whereNotNull('dishes.price')
            ->leftjoin('deals', 'dishes.id', '=', 'deals.dish_id')
            ->select('dishes.*', 'deals.price as discount_price')
            ->orderBy('menu_number')
            ->orderBy('menu_addition')
            ->get();

        $categories = Dish::whereNotNull('category')->distinct()->pluck('category')->unique();

        return view('customer.order', [
            'dishes' => $dishes,
            'categories' => [
                'collection' => $categories,
            ],
            'round' => $this->getRound($this->getTabletId())
        ]);
    }

    private function getTabletId()
    {
        return str_replace('tablet_', '', auth()->user()->employee_id);
    }

    private function canPlaceOrder($tablet_id)
    {
        $round = $this->getRound($tablet_id);
        $lastOrderTime = $this->getLastOrderTime($tablet_id);

        if ($round->round >= self::MAX_ROUNDS) {
            return false;
        } else if ($lastOrderTime) {
            $lastOrderTime->order_time = new DateTime($lastOrderTime->order_time);
            $now = new DateTime();
            $diff = $now->diff($lastOrderTime->order_time);
            if ($diff->i < self::MIN_ORDER_INTERVAL) {
                return false;
            }
        }

        return true;
    }

    private function getLastOrderTime($tablet_id)
    {
        return TabletOrder::where('tablet_id', $tablet_id)
            ->whereDate('order_time', today())->get()->last();
    }

    private function getRound($tablet_id)
    {
        return Round::where('tablet_id', $tablet_id)->first();
    }

    public function store(Request $request)
    {
        $orderData = collect();
        $input = $request->input('dishes');
        if (!$input) {
            return redirect()->back()->with([
                'notification' => [
                    'type' => Notification::Danger,
                    'body' => __('customer/order.validation.dishes.required')
                ]
            ]);
        }

        foreach ($input as $dish) {
            $dishObj = json_decode($dish, true);
            $orderData->push([
                'dishId' => $dishObj['dish'],
                'count' => $dishObj['amount'],
            ]);
        }

        if ($orderData->isEmpty()) {
            return redirect()->back()->with([
                'notification' => [
                    'type' => Notification::Danger,
                    'body' => __('customer/order.validation.dishes.required')
                ]
            ]);
        }

        foreach ($orderData as $orderItem) {
            if ($orderItem['count'] > 10) {
                return redirect()->back()->with([
                    'notification' => [
                        'type' => Notification::Danger,
                        'body' => __('customer/order.validation.dishes.amount.max')
                    ]
                ]);
            } else if ($orderItem['count'] < 1) {
                return redirect()->back()->with([
                    'notification' => [
                        'type' => Notification::Danger,
                        'body' => __('customer/order.validation.dishes.amount.min')
                    ]
                ]);
            }
        }

        if (!$this->canPlaceOrder($this->getTabletId())) {
            return redirect()->back()->with([
                'notification' => [
                    'type' => Notification::Danger,
                    'body' => __('customer/order.validation.order_time_rounds_left')
                ]
            ]);
        }

        $tablet_id = $this->getTabletId();
        $round = $this->getRound($tablet_id);

        $order = TabletOrder::create([
            'tablet_id' => $tablet_id,
            'round' => $round->round,
            'order_time' => now()
        ]);

        foreach ($orderData as $orderItem) {
            $dishModel = Dish::where('id', '=', $orderItem['dishId'])->first();
            $price = $dishModel->deals()->get()->isEmpty() ? $dishModel->price : $dishModel->deals()->first()->price;

            TabletOrderLines::create([
                'tablet_order_id' => $order->id,
                'dish_id' => $orderItem['dishId'],
                'quantity' => $orderItem['count'],
                'price' => $price
            ]);
        }

        $roundObj = Round::where('tablet_id', $tablet_id)->first();
        if ($roundObj !== 5) {
            $roundObj->round = $roundObj->round + 1;
            $roundObj->save();
        } else if (!$roundObj) {
            Round::create([
                'tablet_id' => $tablet_id,
                'round' => $round->round + 1
            ]);
        }

        return redirect()->route('order.index')->with([
            'notification' => [
                'type' => Notification::Success,
                'body' => __('customer/order.order_success')
            ]
        ]);
    }
}
