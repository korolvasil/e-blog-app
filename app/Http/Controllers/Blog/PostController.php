<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    /**
     * Display a listing of the published posts with categories, which is live.
     *
     * @return void
     */
    public function index()
    {
        $posts = BlogPost::withLive('category', 'category.ancestors')
            ->with('user')
            ->whereDoesntHave('category', function (Builder $q) {
                return $q->notLive();
            })
            ->whereDoesntHave('category.ancestors', function (Builder $q) {
                return $q->notLive();
            })
            ->live()->latest()
            ->paginate();

        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  BlogPost  $post
     */
    public function show(BlogPost $post)
    {
        dd($post);
    }
}
