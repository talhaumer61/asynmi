<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminEventsController extends Controller
{
    public function index($action = null, $id = null)
    {
        $event = null;
        $events = Event::latest()->get();

        if ($action === 'edit' && $id) {
            $event = Event::findOrFail($id);
        }

        return view('admin.events', compact('action', 'events', 'event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
            'status'     => 'required|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('events'), $imageName);
            $imagePath = 'uploads/events/'.$imageName;
        }

        Event::create([
            'name'              => $request->name,
            'href'              => Str::slug($request->name),
            'institution'       => $request->institution,
            'representative'    => $request->representative,
            'event_date'        => $request->event_date,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
            'location'          => $request->location,
            'contact_person'    => $request->contact_person,
            'contact_number'    => $request->contact_number,
            'overview'          => $request->overview,
            'detail'            => $request->detail,
            'image'             => $imagePath,
            'status'            => $request->status,
        ]);

        sessionMsg('Success', 'Event added successfully', 'success');
        return redirect()->route('admin.events');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name'       => 'required|string|max:255',
            'event_date' => 'required|date',
            'status'     => 'required|boolean',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('events'), $imageName);
            $event->image = 'uploads/events/'.$imageName;
        }

        $event->update([
            'name'              => $request->name,
            'href'              => Str::slug($request->name),
            'institution'       => $request->institution,
            'representative'    => $request->representative,
            'event_date'        => $request->event_date,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
            'location'          => $request->location,
            'contact_person'    => $request->contact_person,
            'contact_number'    => $request->contact_number,
            'overview'       => $request->overview,
            'detail'            => $request->detail,
            'status'            => $request->status,
        ]);

        sessionMsg('Success', 'Event updated successfully', 'success');
        return redirect()->route('admin.events');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        sessionMsg('Success', 'Event deleted successfully!', 'danger');
        return redirect()->back();
    }
}
