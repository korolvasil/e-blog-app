<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function posts(Tag $tag)
    {
        $posts = BlogPost::withPublished('category', 'category.ancestors', 'tags')
            ->with('user')
            ->whereIn('id', $tag->posts->pluck('id')->all())
            ->whereDoesntHave('category', function ($q) {
                return $q->notPublished();
            })
            ->whereDoesntHave('category.ancestors', function ($q) {
                return $q->notPublished();
            })
            ->published()
            ->latest()
            ->paginate(5);

        return view('blog.tag', compact('posts'));
    }
}
