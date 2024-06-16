<?php

namespace App\Http\Controllers;

use App\Enums\Notification;
use App\Http\Controllers\Controller;
use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tablets = Round::all();

        return view('rounds.index', [
            'tablets' => $tablets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tabletId = $request->input('tablet_id');
        $round = Round::where('tablet_id', $tabletId)->first();
        if ($round) {
            $round->delete();
            return redirect()->route('rounds.index')->with([
                'notification' => [
                    'type' => Notification::Success,
                    'body' => __('manage-rounds.reset_success')
                ]
            ]);
        }

        return redirect()->route('rounds.index')->with([
            'notification' => [
                'type' => Notification::Warning,
                'body' => __('manage-rounds.no_tablets')
            ]
        ]);
    }
}
