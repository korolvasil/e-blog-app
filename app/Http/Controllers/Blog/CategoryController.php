<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Contracts\BlogCategoryRepository;

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
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return Response
     */
    public function show(BlogCategory $category)
    {
        dd($category);
    }
}
