<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Service;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // Courses Listing
    public function index($href=null)
    {
        $courses = Course::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('site.courses', compact('courses', 'href'));
    }

    // Course Detail
    public function detail($href)
    {
        $course = Course::where('href', $href)
            ->where('status', 1)
            ->firstOrFail();

        $otherCourses = Course::where('status', 1)
            ->where('id', '!=', $course->id)
            ->limit(5)
            ->get();

        return view('site.courses', compact('course', 'otherCourses', 'href'));
    }
}
