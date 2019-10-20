<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogCategory;
use App\Repositories\Contracts\BlogCategoryRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\IsLive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is.live:category']);
    }
    
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
            new EagerLoad(['user','posts', 'posts.user'])
        ])->get();

        return view('blog.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return Response
     */
    public function edit(BlogCategory $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\Category  $category
     * @return Response
     */
    public function update(Request $request, BlogCategory $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return Response
     */
    public function destroy(BlogCategory $category)
    {
        //
    }
}
