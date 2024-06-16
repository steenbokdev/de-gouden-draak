<?php

namespace App\Http\Controllers;

use App\Models\CheckoutOrder;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dateFrom = request()->input('date_from');
        $dateTo = request()->input('date_to');

        $sales = CheckoutOrder::all()->sortByDesc('created_at');
        $days = $sales->map(function ($item) {
            return Carbon::parse($item->created_at)->format('d-m-Y');
        })->unique();

        if (isset($dateFrom)) {
            $sales = $sales->where('created_at', '>=', $dateFrom);
        }

        if (isset($dateTo)) {
            $sales = $sales->where('created_at', '<=', $dateTo);
        }

        return view('sales.index', [
            'sales' => $sales,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
            'days' => $days
        ]);
    }

    public function download()
    {
        $date = request()->input('sale_date');
        $carbonDate = Carbon::createFromFormat('d-m-Y', $date)->startOfDay();

        $sales = CheckoutOrder::whereDate('created_at', $carbonDate)->get();
        $totalPrice = $sales->sum(function ($sale) {
            return $sale->price_per_item * $sale->item_count;
        });

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('sales.download', [
            'date' => $date,
            'sales' => $sales,
            'totalPrice' => $totalPrice
        ]));

        return $pdf->download("Verkoopcijfers_$date.pdf");
    }

    public function receipt()
    {
        $latest = CheckoutOrder::all('created_at')->sortByDesc('created_at')->first();
        $sales = CheckoutOrder::where('created_at', $latest->created_at)->get();
        $totalPrice = $sales->sum(function ($sale) {
            return $sale->price_per_item * $sale->item_count;
        });

        $logoImage = base64_encode(file_get_contents(public_path('images/dragon-small.png')));
        $logoImageFlipped = base64_encode(file_get_contents(public_path('images/dragon-small-flipped.png')));

        $options = new Options();
        $dompdf = new Dompdf($options);
        $dompdf->setPaper([0, 0, 226.771, 283.464], 'portrait'); // Dimensions in mm (8cm x 10cm)
        $dompdf->loadHtml(view('order.checkout.receipt', [
            'sales' => $sales,
            'totalPrice' => $totalPrice,
            'logoImage' => $logoImage,
            'logoImageFlipped' => $logoImageFlipped
        ]));

        $dompdf->render();

        return $dompdf->stream('document.pdf');
    }
}
