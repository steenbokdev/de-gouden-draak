<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $language = $request->input('language');

        session(['language' => $language]);

        return redirect()->back()->with(['language_switched' => $language]);
    }
}
