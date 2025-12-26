<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($href=null){
        return view('site.services', compact('href'));
    }
    
    public function detail( $href=null ){
        return view('site.services', compact('href'));
    }
}
