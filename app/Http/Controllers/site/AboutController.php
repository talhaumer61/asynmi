<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = AboutUs::where('status', 1)->first();

        return view('site.about', compact('about'));
    }
}
