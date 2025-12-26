<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)
            ->latest()
            ->paginate(6); // pagination

        return view('site.blogs', compact('blogs'));
    }

    public function detail($href)
    {
        $blog = Blog::where('href', $href)
            ->where('status', 1)
            ->firstOrFail();

        // Recent posts
        $recentBlogs = Blog::where('status', 1)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('site.blogs', compact('href','blog', 'recentBlogs'));
    }
}
