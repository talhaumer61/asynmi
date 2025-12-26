<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogsController extends Controller
{
    public function index($action = 'list', $id = null)
    {
        $blog = null;
        $blogs = Blog::latest()->get();

        if ($action === 'edit' && $id) {
            $blog = Blog::findOrFail($id);
        }

        return view('admin.blogs', compact('action', 'blogs', 'blog'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'overview' => 'nullable|string',
            'detail'   => 'nullable|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'   => 'required|boolean',
        ]);

        // Handle image upload (same style as services)
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('blogs'), $imageName);
            $imagePath = 'uploads/blogs/' . $imageName;
        }

        Blog::create([
            'title'    => $request->title,
            'href'     => Str::slug($request->title),
            'overview' => $request->overview,
            'detail'   => $request->detail,
            'image'    => $imagePath,
            'status'   => $request->status,
        ]);

        sessionMsg('Success', 'Blog added successfully!', 'success');
        return redirect()->route('admin.blogs');
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'overview' => 'nullable|string',
            'detail'   => 'nullable|string',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status'   => 'required|boolean',
        ]);

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(upload_path('blogs'), $imageName);
            $imagePath = 'uploads/blogs/' . $imageName;
        }

        $blog->update([
            'title'    => $request->title,
            'href'     => Str::slug($request->title),
            'overview' => $request->overview,
            'detail'   => $request->detail,
            'image'    => $imagePath,
            'status'   => $request->status,
        ]);

        sessionMsg('Success', 'Blog updated successfully!', 'success');
        return redirect()->route('admin.blogs');
    }


    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();

        sessionMsg('danger', 'Blog deleted successfully!', 'danger');
        return redirect()->back()->with('success', 'Blog deleted');
    }
}