<?php

namespace App\Console\Commands;

use App\Models\CheckoutOrder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class DownloadTodaysSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:download-todays-sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download the sales of the current day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = now()->format('d-m-Y');
        $sales = CheckoutOrder::whereDate('created_at', now()->toDateString())->get();
        $totalPrice = $sales->sum(function($sale) {
            return $sale->price_per_item * $sale->item_count;
        });

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('sales.download', [
            'date' => $date,
            'sales' => $sales,
            'totalPrice' => $totalPrice
        ])->render());

        $output = $pdf->output();
        $filePath = storage_path("app/public/downloads/Verkoopcijfers_$date.pdf");
        file_put_contents($filePath, $output);

        $this->info('PDF for today\'s sales has been generated and saved.');
    }
}
