<?php

Route::resource('blog/posts', 'Blog\PostController');
Route::resource('blog/categories', 'Blog\CategoryController');

Auth::routes(['verify' => true]);

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
