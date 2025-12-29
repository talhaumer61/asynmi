<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUniversitiesController extends Controller
{
    public function index($action = null, $id = null)
    {
        if ($action === 'add') {
            $countries = Country::where('status', 1)->get();
            return view('admin.universities', compact('countries', 'action'));
        }

        if ($action === 'edit' && $id) {
            $university = University::findOrFail($id);
            $countries = Country::where('status', 1)->get();
            return view('admin.universities', compact('university', 'countries', 'action'));
        }

        $universities = University::with('country')->latest()->get();
        return view('admin.universities', compact('universities', 'action'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'country_id'  => 'required|exists:countries,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'      => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('universities'), $name);
            $imagePath = 'uploads/universities/'.$name;
        }

        University::create([
            'name'          => $request->name,
            'href'          => Str::slug($request->name),
            'country_id'    => $request->country_id,
            'city'          => $request->city,
            'ranking'       => $request->ranking,
            'tuition_fee'   => $request->tuition_fee,
            'intake_months' => implode(',', $request->intake_months ?? []),
            'ielts_score'   => $request->ielts_score,
            'image'         => $imagePath,
            'status'        => $request->status,
        ]);

        sessionMsg('Success', 'University added successfully', 'success');
        return redirect()->route('admin.universities');
    }

    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);

        if ($request->hasFile('image')) {
            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('universities'), $name);
            $university->image = 'uploads/universities/'.$name;
        }

        $university->update([
            'name'          => $request->name,
            'href'          => Str::slug($request->name),
            'country_id'    => $request->country_id,
            'city'          => $request->city,
            'ranking'       => $request->ranking,
            'tuition_fee'   => $request->tuition_fee,
            'intake_months' => implode(',', $request->intake_months ?? []),
            'ielts_score'   => $request->ielts_score,
            'status'        => $request->status,
        ]);

        sessionMsg('Success', 'University updated successfully', 'success');
        return redirect()->route('admin.universities');
    }

    public function delete($id)
    {
        University::findOrFail($id)->delete();
        sessionMsg('Deleted', 'University removed successfully', 'success');
        return redirect()->back();
    }
}
