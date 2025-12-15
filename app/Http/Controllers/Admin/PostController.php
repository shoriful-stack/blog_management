<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('category')->get()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|min:50',
            'status' => 'required|in:draft,published'
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status == 'published' ? now() : null
        ]);

        return redirect()->route('admin.posts.index');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string|min:50',
            'status' => 'required|in:draft,published',
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->status === 'published'
                ? ($post->published_at ?? now())
                : null,
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
