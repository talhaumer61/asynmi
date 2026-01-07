<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdminAdsController extends Controller
{
    public function index($action = "list", $id = null)
    {
        $ad = null;
        if ($id) {
            $ad = Advertisement::find($id);
        }
        $ads = Advertisement::where('status',1)->get();
        return view('admin.ads', compact('ads', 'ad', 'action'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('ads'), $imageName);
            $imagePath = 'uploads/ads/' . $imageName;
        }

        Advertisement::create([
            'url'       => $request->url,
            'status'     => $request->status,
            'image'      => $imagePath,
        ]);

        sessionMsg('success', 'Advertisement added successfully','success');
        return redirect()->route('admin.ads');
    }

    public function update(Request $request, $id)
    {
        $ad = Advertisement::findOrFail($id);

        $imagePath = $ad->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('ads'), $imageName);
            $imagePath = 'uploads/ads/' . $imageName;
        }

        $ad->update([
            'url'       => $request->url,
            'status'     => $request->status,
            'image'    => $imagePath,
        ]);

        sessionMsg('success', 'Advertisement updated successfully','success');
        return redirect()->route('admin.ads');
    }

    public function destroy($id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->delete();

        sessionMsg('success', 'Advertisement deleted successfully','success');
        return redirect()->route('admin.ads');
    }
}
