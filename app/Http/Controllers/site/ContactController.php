<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = ContactInfo::where('status', 1)->first();

        return view('site.contact', compact('contact'));
    }
}
