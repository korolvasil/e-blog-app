<?php

Auth::routes(['verify' => true]);

Route::namespace('Blog')->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'PostController@index')
        ->name('posts.all');

    Route::get('/post/{post}', 'PostController@show')->middleware('is.live:post')
        ->name('posts.show');

    Route::get('/category/{category}', 'CategoryController@posts')->middleware('is.live:category')
        ->name('posts.by.category');

    Route::get('/categories', 'CategoryController@index')
        ->name('categories.all');
});

/* Home */
Route::get('/', function () {
    return view('home');
})->name('home');

/* Admin Panel */
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'role:admin'])->group( function (){
    Route::get('{path?}', 'AdminController@panel')
        ->where('path', '.*')
        ->name('admin.panel');
});
