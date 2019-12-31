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
        $posts = $tag->posts()
            ->with('user')
            ->withPublished('category', 'category.ancestors', 'tags')
            ->live()->latest()->paginate(5);

        return view('blog.tag', compact('posts'));
    }
}
