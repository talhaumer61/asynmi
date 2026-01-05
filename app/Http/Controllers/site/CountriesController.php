<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    // LIST PAGE
    public function index($href = null)
    {
        $countries = Country::withCount('universities')
            ->where('status', 1)
            ->orderBy('name')
            ->get();

        return view('site.countries', compact('countries', 'href'));
    }

    // DETAIL PAGE
    public function detail($href)
    {
        $country = Country::where('href', $href)
            ->where('status', 1)
            ->with(['universities' => function ($q) {
                $q->where('status', 1);
            }])
            ->firstOrFail();

        return view('site.countries', compact('country', 'href'));
    }
}
