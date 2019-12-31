<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display the list of published posts which belongs to specific category with
     * published posts, that belongs to the children published categories.
     *
     * @param BlogCategory $category
     * @return void
     */
    public function posts(BlogCategory $category)
    {
        $posts = BlogPost::with('user')
            ->withPublished('category', 'category.ancestors', 'tags')
            ->whereIn('category_id', $category->descendants->pluck('id')->merge($category->id))
            ->live()->latest()->paginate();

        return view('blog.category', compact('posts'));
    }
}
