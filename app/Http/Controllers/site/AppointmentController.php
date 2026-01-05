<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Country;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        return view('site.appointment', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'qualification' => 'required',
            'city'          => 'required',
            'country_id'    => 'required',
        ]);

        Appointment::create($request->all());

        return redirect()->back()->with('success', 'Appointment Request submitted successfully!');
    }
}
