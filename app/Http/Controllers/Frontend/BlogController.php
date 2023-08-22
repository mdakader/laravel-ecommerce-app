<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        if ($request->has('search')) {
            $blogs = Blog::where('title', 'like', '%' . $request->search . '%')
                ->where('status', 1)->orderBy('id', 'DESC')
                ->paginate(12);
        } elseif ($request->has('category')) {
            $category = BlogCategory::where('slug', $request->category)
                ->where('status',1)->firstOrFail();

            $blogs = Blog::where('category_id', $category->id)
                ->where('status', 1)->orderBy('id', 'DESC')
                ->paginate(12);
        } else {
            $blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        }
        return view('frontend.pages.blog', compact('blogs'));
    }
    public function blogDetails(string $slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail();
        $moreBlogs = Blog::where('slug', '!=', $slug)->where('status', 1)->orderBy('id', 'DESC')->take(5)->get();
        $recentBlogs = Blog::where('slug', '!=', $slug)->where('status', 1)
            ->where('category_id', $blog->category_id)->orderBy('id', 'DESC')->take(12)->get();

        $categories = BlogCategory::where('status', 1)->get();
        return view('frontend.pages.blog-detail', compact('blog', 'moreBlogs','recentBlogs', 'categories'));
    }

}
