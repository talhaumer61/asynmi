<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index($action = "list", $id = null)
    {
        $banner = null;
        if ($id) {
            $banner = Banner::find($id);
        }
        $banners = Banner::orderBy('sort_order')->get();
        return view('admin.banners', compact('banners', 'banner', 'action'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('banners'), $imageName);
            $imagePath = 'uploads/banners/' . $imageName;
        }

        Banner::create([
            'title'      => $request->title,
            'link'       => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status,
            'image'      => $imagePath,
        ]);

        sessionMsg('success', 'Banner added successfully','success');
        return redirect()->route('admin.banners');
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $imagePath = $banner->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('banners'), $imageName);
            $imagePath = 'uploads/banners/' . $imageName;
        }

        $banner->update([
            'title'      => $request->title,
            'link'       => $request->link,
            'sort_order' => $request->sort_order ?? 0,
            'status'     => $request->status,
            'image'    => $imagePath,
        ]);

        sessionMsg('success', 'Banner updated successfully','success');
        return redirect()->route('admin.banners');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        sessionMsg('success', 'Banner deleted successfully','success');
        return redirect()->route('admin.banners');
    }
}
