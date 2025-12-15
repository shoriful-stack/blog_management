<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categories' => Category::all(),
            'posts' => Post::where('status', 'published')
                ->latest()->take(6)->get()
        ]);
    }

    public function blogDetails($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.details', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('category.posts', compact('category'));
    }
}
