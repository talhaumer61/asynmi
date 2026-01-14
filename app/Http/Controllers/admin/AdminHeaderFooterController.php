<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NavElement;
use Illuminate\Http\Request;

class AdminHeaderFooterController extends Controller
{
    public function index()
    {
        $headerElements = NavElement::where('location', 'header')->get();
        $footerElements = NavElement::where('location', 'footer')->get();

        return view('admin.header_footer', compact('headerElements', 'footerElements'));
    }

    public function update(Request $request)
    {
        $visibleIds = $request->input('visible', []);

        // First hide all
        NavElement::query()->update(['is_visible' => 0]);

        // Enable selected
        if (!empty($visibleIds)) {
            NavElement::whereIn('id', $visibleIds)->update(['is_visible' => 1]);
        }

        sessionMsg('success', 'Navigation updated successfully.', 'success');
        return redirect()->back();
    }
}
