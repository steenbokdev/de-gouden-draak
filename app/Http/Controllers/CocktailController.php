<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CocktailController extends Controller
{
    private string $base_uri = 'www.thecocktaildb.com/api/json/v1/1';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Validating the input is not necessary, the API will do that for us.
        $searchQuery = request()->input('search');
        $categoryQuery = request()->input('category') ?? 'Ordinary_Drink';
        $alcoholicQuery = request()->input('alcoholic') ?? 'Alcoholic';

        if (isset($searchQuery)) {
            $response = Http::get("$this->base_uri/search.php?s=$searchQuery");
        } else if (isset($categoryQuery) || isset($alcoholicQuery)) {
            $response = Http::get("$this->base_uri/filter.php?c=$categoryQuery&a=$alcoholicQuery");
        }

        $cocktails = [];

        if ($response->successful()) {
            $json = $response->json('drinks');
            $cocktails = Cocktail::hydrate($json);
        }

        return view('cocktail.index', [
            'cocktails' => $cocktails,
            'searchQuery' => $searchQuery,
            'categories' => [
                'collection' => $this->categories(),
                'selected' => $categoryQuery
            ],
            'alcoholics' => [
                'collection' => $this->alcoholic(),
                'selected' => $alcoholicQuery
            ]
        ]);
    }

    private function categories()
    {
        return [
            'ordinary_drink' => __('cocktail/index.filter.category.ordinary_drink'),
            'cocktail' => __('cocktail/index.filter.category.cocktail'),
            'shake' => __('cocktail/index.filter.category.shake'),
            'other_/_unknown' => __('cocktail/index.filter.category.other_and_unknown'),
            'cocoa' => __('cocktail/index.filter.category.cocoa'),
            'shot' => __('cocktail/index.filter.category.shot'),
            'coffee_/_tea' => __('cocktail/index.filter.category.coffee_and_tea'),
            'homemade_liqueur' => __('cocktail/index.filter.category.homemade_liqueur'),
            'punch_/_party_drink' => __('cocktail/index.filter.category.punch_and_party_drink'),
            'beer' => __('cocktail/index.filter.category.beer'),
            'soft_drink' => __('cocktail/index.filter.category.soft_drink')
        ];
    }

    private function alcoholic()
    {
        return [
            'alcoholic' => __('cocktail/index.filter.alcoholic.alcoholic'),
            'non_alcoholic' => __('cocktail/index.filter.alcoholic.non_alcoholic'),
            'optional_alcoholic' => __('cocktail/index.filter.alcoholic.optional_alcohol')
        ];
    }
}
