<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\UserQuery;
use Illuminate\Http\Request;

class AdminQueriesController extends Controller
{
    public function index(Request $request)
    {
        $query = UserQuery::latest();

        // 🔎 Filters
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->subject) {
            $query->where('subject', 'like', '%' . $request->subject . '%');
        }

        $queries = $query->paginate(15);

        return view('admin.queries', compact('queries'));
    }

    // 🔍 Detail view for modal
    public function show($id)
    {
        $query = UserQuery::findOrFail($id);
        return view('admin.include.queries.modal', compact('query'));
    }
}
