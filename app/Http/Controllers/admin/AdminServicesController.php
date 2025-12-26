<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminServicesController extends Controller
{
    public function index($action = "list", $href = null)
    {
        return view('admin.services', compact('action'));
    }
}
