<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:newsletters,email']);

        Newsletter::create(['email' => $request->email]);

        // Assuming you have a helper for session messages
        sessionMsg('success', 'Thank you for subscribing!', 'success');
        return redirect()->back();
    }
}
