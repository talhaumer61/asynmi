<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index($href=null){
        return view('site.countries', compact('href'));
    }
    
    public function detail( $href=null ){
        return view('site.countries', compact('href'));
    }
}
