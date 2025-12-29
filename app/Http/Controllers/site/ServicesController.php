<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index($href=null)
    {
        $services = Service::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('site.services', compact('services', 'href'));
    }

    // Service Detail
    public function detail($href)
    {
        $service = Service::where('href', $href)
            ->where('status', 1)
            ->firstOrFail();

        // Optional: show other services in sidebar
        $otherServices = Service::where('status', 1)
            ->where('id', '!=', $service->id)
            ->limit(5)
            ->get();

        return view('site.services', compact('service', 'otherServices', 'href'));
    }
}
