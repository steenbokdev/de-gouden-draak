<?php

namespace App\Http\Controllers;

use App\Models\CheckoutOrder;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateFrom = request()->input('date_from');
        $dateTo = request()->input('date_to');

        $sales = CheckoutOrder::all()->sortBy('created_at');

        if (isset($dateFrom)) {
            $sales = $sales->where('created_at', '>=', $dateFrom);
        }

        if (isset($dateTo)) {
            $sales = $sales->where('created_at', '<=', $dateTo);
        }

        return view('sales.index', [
            'sales' => $sales,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo
        ]);
    }
}
