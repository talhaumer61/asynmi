<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\UserQuery;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = ContactInfo::where('status', 1)->first();

        return view('site.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        UserQuery::create($request->only([
            'name', 'phone', 'email', 'subject', 'message'
        ]));

        return back()->with('success', 'Your query has been submitted successfully!');
    }
}
