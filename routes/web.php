<?php
/* Home */
Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::namespace('Blog')->prefix('/blog')->name('blog.')->group(function () {
    //displays list of all blog posts
    Route::get('/', 'PostController@index')
        ->name('posts');

    // displays concrete post
    Route::get('/post/{post}', 'PostController@show')->middleware('is.live:post')
        ->name('post.show');

    // displays list of posts which has current category as parent or as descendant
    Route::get('/category/{category}', 'CategoryController@posts')->middleware('is.live:category')
        ->name('posts.by.category');

    // displays list of posts which was tagged with current tag
    Route::get('/tag/{tag}', 'TagController@posts')->middleware('is.published:tag')
        ->name('posts.by.tag');

    // displays lists of posts grouped by current tag OR category in one page
    Route::get('/{tagOrCategory}', 'PostController@byAny')->middleware(['is.published:category', 'is.published:tag'])
        ->name('posts.by.any');

    // displays lists of posts grouped by tag AND category in one page
    Route::get('/all', 'PostController@all')->middleware(['is.published:category', 'is.published:tag'])
        ->name('posts.by.all');
});

/* Admin Panel */
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'role:admin'])->group( function (){
    Route::get('{path?}', 'AdminController@panel')
        ->where('path', '.*')
        ->name('admin.panel');
});
