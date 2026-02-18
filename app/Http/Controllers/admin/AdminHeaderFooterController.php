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
        $footerElements = NavElement::where('location', 'footer')->where('type', 'link')->get();

        // Footer Sections (The columns)
        $footerSections = NavElement::where('location', 'footer')->where('type', 'section')->orderBy('sort_order')->get();

        return view('admin.header_footer', compact('headerElements', 'footerElements', 'footerSections'));
    }

    public function update(Request $request)
    {
        $visibleIds = $request->input('visible', []);
        $sortOrders = $request->input('sort_order', []);

        // First hide all
        NavElement::query()->update(['is_visible' => 0]);

        // Enable selected
        if (!empty($visibleIds)) {
            NavElement::whereIn('id', $visibleIds)->update(['is_visible' => 1]);
        }
        // Update Sort Order for Sections
        foreach ($sortOrders as $id => $order) {
            NavElement::where('id', $id)->update(['sort_order' => $order ?? 0]);
        }

        sessionMsg('success', 'Navigation updated successfully.', 'success');
        return redirect()->back();
    }
}
