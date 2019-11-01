<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\BlogCategoryRepository;

use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\WithCount;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\EagerLoadLive;

class PostController extends Controller
{
    /**
     * Display a listing of the published posts with categories, which is live.
     *
     * @param PostRepository $posts
     * @param BlogCategoryRepository $categories
     * @return void
     */
    public function index(PostRepository $posts, BlogCategoryRepository $categories)
    {
        /*$posts = $posts->withCriteria([
            new IsLive(),
            new LatestFirst(),
            new EagerLoad('user'),
            new EagerLoadLive('category', 'category.parent')
        ])->paginate();*/

        $posts = BlogPost::with('user', 'category', 'category.parent')
            ->live()->latest()
            ->whereDoesntHave('category', function (Builder $q) {
                return $q->notLive();
            })
            ->whereDoesntHave('category.parent', function (Builder $q) {
                return $q->notLive();
            })
            ->paginate();

        $categories = $this->sidebarCategories($categories);

        return view('blog.index', compact('posts', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        dd($post);
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
