<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /*
     * Display a listing of the published posts with categories, which is live.
     */
    public function index()
    {
        $posts = BlogPost::with('user')
            ->withPublished('category', 'category.ancestors', 'tags')
            ->live()->latest()->paginate();

        return view('blog.index', compact('posts'));
    }

    /*
     * Display the specified resource.
     */
    public function show(BlogPost $post)
    {
        dd($post);
    }
}
