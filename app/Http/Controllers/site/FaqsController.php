<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqsController extends Controller
{
    public function index()
    {
        // Get only active FAQs
        $faqs = Faq::where('status', 1)->latest()->get();

        return view('site.faqs', compact('faqs'));
    }
}
