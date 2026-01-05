<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AdminAboutUsController extends Controller
{
    public function index($action = null, $id = null)
    {
        $about = AboutUs::where('status', 1)->first();

        if ($action === 'edit' && $id) {
            $about = AboutUs::findOrFail($id);
        }

        return view('admin.about_us', compact('about', 'action'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'about'   => 'nullable|string',
            'mission' => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('about'), $name);
            $imagePath = 'uploads/about/'.$name;
        }

        AboutUs::create([
            'status'  => 1,
            'about'   => $request->about,
            'mission' => $request->mission,
            'vision'  => $request->vision,
            'image'   => $imagePath,
        ]);

        sessionMsg('Success', 'About Us added successfully', 'success');
        return redirect()->route('admin.about');
    }

    public function update(Request $request, $id)
    {
        $about = AboutUs::findOrFail($id);

        $request->validate([
            'about'   => 'nullable|string',
            'mission' => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('about'), $name);
            $about->image = 'uploads/about/'.$name;
        }

        $about->update([
            'status'  => 1,
            'about'   => $request->about,
            'mission' => $request->mission,
            'vision'  => $request->vision,
        ]);

        sessionMsg('Success', 'About Us updated successfully', 'success');
        return redirect()->route('admin.about');
    }
}
