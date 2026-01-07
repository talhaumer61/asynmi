<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class AdminPartnersController extends Controller
{
    public function index($action = "list", $id = null)
    {
        $partner = null;
        if ($id) {
            $partner = Partner::find($id);
        }
        $partners = Partner::where('status', 1)->get();
        return view('admin.partners', compact('partners', 'partner', 'action'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;
        if ($request->hasFile('logo')) {
            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(upload_path('partners'), $imageName);
            $imagePath = 'uploads/partners/' . $imageName;
        }

        Partner::create([
            'name'      => $request->name,
            'status'     => $request->status,
            'logo'      => $imagePath,
        ]);

        sessionMsg('success', 'Partner added successfully','success');
        return redirect()->route('admin.partners');
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $imagePath = $partner->image;

        if ($request->hasFile('logo')) {
            $imageName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(upload_path('partners'), $imageName);
            $imagePath = 'uploads/partners/' . $imageName;
        }

        $partner->update([
            'name'      => $request->name,
            'status'    => $request->status,
            'logo'     => $imagePath,
        ]);

        sessionMsg('success', 'Partner updated successfully','success');
        return redirect()->route('admin.partners');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        sessionMsg('success', 'Partner deleted successfully','success');
        return redirect()->route('admin.partners');
    }
}
