<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    // List all events
    public function index($href = null)
    {
        $events = Event::where('status', 1)
            ->orderBy('event_date', 'asc')
            ->get();

        return view('site.events', compact('events', 'href'));
    }

    // Event detail
    public function detail($href)
    {
        $event = Event::where('href', $href)
            ->where('status', 1)
            ->firstOrFail();

        $otherEvents = Event::where('status', 1)
            ->where('id', '!=', $event->id)
            ->limit(5)
            ->get();

        return view('site.events', compact('event', 'otherEvents', 'href'));
    }
}
