<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostRepository $posts
     * @param UserRepository $users
     * @return void
     */
    public function index(PostRepository $posts, UserRepository $users)
    {
//        dd($posts->create([
//            'user_id' => 1,
//            'slug' => 'test-slug',
//            'title' => 'Test post',
//            'excerpt' => 'Ad doloribus eius fugiat id illo incidunt modi',
//            'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad doloribus eius fugiat id illo incidunt modi nostrum nulla omnis quibusdam.</p>'
//        ]));

//        dd(
//            $posts->all(),
//            $posts->find(7),
//            $posts->paginate(5),
//            $posts->findWhere('slug', 'aspernatur-est-minus-quam-possimus-autem'),
//            $posts->findWhereFirst('slug', 'aspernatur-est-minus-quam-possimus-autem'),
//            $users->all()
//        );
        $posts = $posts->withCriteria(new LatestFirst())->paginate();
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
