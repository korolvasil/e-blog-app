<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

use App\Repositories\Contracts\BlogCategoryRepository;

use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\WithCount;

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
     * @param BlogCategoryRepository $categories
     * @return void
     */
    public function posts(BlogCategory $category, BlogCategoryRepository $categories)
    {
        $posts = BlogPost::withLive('category', 'category.parent')
            ->with('user')
            ->live()
            ->latest()
            ->whereHas('category', function (Builder $q) use ($category) {
                return $q->live()->whereIn('id', $category->children->pluck('id')->merge($category->id));
            })
            ->paginate();

        $categories = $this->sidebarCategories($categories);

        return view('blog.index', compact('posts', 'categories'));
    }

    /* SideBar Category Module's categories data with posts count */
    protected function sidebarCategories(BlogCategoryRepository $categories)
    {
        $categories = $categories->withCriteria([
            new IsLive(),
            new WithCount(['posts' => function ($q) {
                return $q->live();
            }])
        ])->get()->where('posts_count', '<>', 0);

        /* We should increase each category's posts_count with theirs children's posts_count */
        foreach ($categories as $category) {
            $category->posts_count += $categories->where('parent_id', $category->id)->pluck('posts_count')->sum();
        }

        return $categories;
    }
}
