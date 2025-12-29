<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCoursesController extends Controller
{
    public function index($action = null, $id = null)
    {
        $course = null;
        $courses = Course::latest()->get();

        if ($action === 'edit' && $id) {
            $course = Course::findOrFail($id);
        }

        return view('admin.courses', compact('action', 'courses', 'course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'overview' => 'nullable|string',
            'detail'   => 'nullable|string',
            'status'   => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('courses'), $imageName);
            $imagePath = 'uploads/courses/'.$imageName;
        }

        Course::create([
            'name'     => $request->name,
            'href'     => Str::slug($request->name),
            'image'    => $imagePath,
            'overview' => $request->overview,
            'detail'   => $request->detail,
            'status'   => $request->status,
        ]);

        sessionMsg('Success', 'Course added successfully', 'success');
        return redirect()->route('admin.courses');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(upload_path('courses'), $imageName);
            $course->image = 'uploads/courses/'.$imageName;
        }

        $course->update([
            'name'     => $request->name,
            'href'     => Str::slug($request->name),
            'overview' => $request->overview,
            'detail'   => $request->detail,
            'status'   => $request->status,
        ]);

        sessionMsg('Success', 'Course updated successfully', 'success');
        return redirect()->route('admin.courses');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        sessionMsg('danger', 'Course deleted successfully!', 'danger');
        return redirect()->back();
    }
}