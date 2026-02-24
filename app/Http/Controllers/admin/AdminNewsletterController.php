<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class AdminNewsletterController extends Controller
{
    public function index(Request $request)
{
    $query = Newsletter::query();

    if ($request->has('search')) {
        $query->where('email', 'like', '%' . $request->search . '%');
    }

    $subscribers = $query->orderBy('created_at', 'desc')->paginate(10);

    if ($request->ajax()) {
        // Return only the table rows and pagination links
        return view('admin.newsletter', compact('subscribers'))->fragment('table-content');
    }

    return view('admin.newsletter', compact('subscribers'));
}

    public function destroy($id)
    {
        Newsletter::findOrFail($id)->delete();
        sessionMsg('success', 'Subscriber removed successfully!', 'success');
        return redirect()->back();
    }
}