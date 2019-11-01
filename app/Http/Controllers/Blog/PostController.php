<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\EagerLoadLive;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Eloquent\Criteria\ByUser;
use App\Repositories\Eloquent\Criteria\IsLive;
use App\Repositories\Eloquent\Criteria\LatestFirst;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostRepository $posts
     * @return void
     */
    public function index(PostRepository $posts)
    {
        $posts = $posts->withCriteria([
            new IsLive(),
            new LatestFirst(),
            new EagerLoad('user'),
            new EagerLoadLive('category', 'category.parent')
        ])->paginate();

        return view('blog.index', compact('posts'));
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
}
