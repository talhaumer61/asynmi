<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCountriesController extends Controller
{
    public function index($action = null, $id = null)
    {
        $country = null;
        $countries = Country::latest()->get();

        if ($action === 'edit' && $id) {
            $country = Country::findOrFail($id);
        }

        return view('admin.countries', compact('action', 'countries', 'country'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'country_code'   => 'nullable|string|max:10',
            'currency'       => 'nullable|string|max:50',
            'currency_code'  => 'nullable|string|max:10',
            'currency_symbol'=> 'nullable|string|max:10',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'         => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('countries'), $imageName);
            $imagePath = 'uploads/countries/'.$imageName;
        }

        Country::create([
            'name'            => $request->name,
            'href'            => Str::slug($request->name),
            'country_code'    => $request->country_code,
            'currency'        => $request->currency,
            'currency_code'   => $request->currency_code,
            'currency_symbol' => $request->currency_symbol,
            'overview'        => $request->overview,
            'detail'          => $request->detail,
            'image'           => $imagePath,
            'status'          => $request->status,
        ]);

        sessionMsg('Success', 'Country added successfully', 'success');
        return redirect()->route('admin.countries');
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('countries'), $imageName);
            $country->image = 'uploads/countries/'.$imageName;
        }

        $country->update([
            'name'            => $request->name,
            'href'            => Str::slug($request->name),
            'country_code'    => $request->country_code,
            'currency'        => $request->currency,
            'currency_code'   => $request->currency_code,
            'currency_symbol' => $request->currency_symbol,
            'overview'        => $request->overview,
            'detail'          => $request->detail,
            'status'          => $request->status,
        ]);

        sessionMsg('Success', 'Country updated successfully', 'success');
        return redirect()->route('admin.countries');
    }

    public function delete($id)
    {
        Country::findOrFail($id)->delete();

        sessionMsg('Deleted', 'Country removed successfully', 'success');
        return redirect()->back();
    }
}
