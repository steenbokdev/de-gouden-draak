<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(UpdateLanguageRequest $request)
    {
        $validated = $request->validated();
        $language = $validated['language'];

        session(['language' => $language]);

        return redirect()->back()->with(['language_switched' => $language]);
    }
}
