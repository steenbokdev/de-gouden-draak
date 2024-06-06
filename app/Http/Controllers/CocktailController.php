<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic');

        $cocktails = [];

        if ($response->successful()) {
            $json = $response->json('drinks');
            $cocktails = Cocktail::hydrate($json);
        }

        return view('cocktail.index', [
            'cocktails' => $cocktails
        ]);
    }

    /**
