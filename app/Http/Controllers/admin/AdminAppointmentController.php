<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Country;

class AdminAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with('country')->latest();

        // 🔎 Filters
        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->country_id) {
            $query->where('country_id', $request->country_id);
        }

        $appointments = $query->paginate(15);
        $countries    = Country::orderBy('name')->get();

        return view('admin.appointments', compact('appointments', 'countries'));
    }

    public function show($id)
    {
        $appointment = Appointment::with('country')->findOrFail($id);
        return view('admin.include.appointments.modal', compact('appointment'));
    }
}
