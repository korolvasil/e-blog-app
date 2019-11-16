<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\BlogCategoryRepository;

use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\EagerLoad;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BlogCategoryRepository $categories
     * @return Response
     */
    public function index(BlogCategoryRepository $categories)
    {
        $categories = $categories->withCriteria([
            new IsLive(),
            new EagerLoad(['user', 'posts', 'posts.user'])
        ])->get();

        return view('blog.category', compact('categories'));
    }

    /**
     * Display the list of published posts which belongs to specific category with
     * published posts, that belongs to the children published categories.
     *
     * @param BlogCategory $category
     * @return void
     */
    public function posts(BlogCategory $category)
    {
        $posts = BlogPost::withLive('category', 'category.ancestors')
            ->with('user')->live()->latest()
            ->whereHas('category', function ($q) use ($category) {
                return $q->live()->whereIn('id', $category->descendants->pluck('id')->merge($category->id));
            })
            ->paginate();

        return view('blog.category', compact('posts'));
    }
}
