<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Banner;
use App\Models\Country;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::where('status', 1)
        ->orderBy('sort_order')
        ->get();

        $countries = Country::where('status', 1)
        ->limit(8)
        ->get();

        $ads = Advertisement::where('status', 1)->get();

        $partners = Partner::where('status', 1)->get();

        return view('site.home', compact('banners', 'countries', 'ads', 'partners'));
    }
}
