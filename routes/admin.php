<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    // Manage users
    Route::get('/users', 'AdminController@users')->name('users');

    Route::get('/profile', 'UserController@profile')->name('profile');

    Route::get('/profile/update', 'UserController@getUpdate')->name('profile.update');

    Route::post('/profile/update', 'UserController@postUpdate')->name('profile.update');

    // -------------------------------- //

    // Manage posts
    Route::get('/post/create', 'PostController@getStore')->name('post.create');

    Route::get('/posts', 'PostController@posts')->name('posts');

    // -------------------------------- //

    // Manage comments
    Route::get('/comments', 'AdminController@comments')->name('comments');

    // Manage categories
    Route::get('/categories', 'AdminController@categories')->name('categories');


    Route::get('/new/post', 'UserController@createPost')->name('post.new');
    Route::get('/posts', 'UserController@getPosts')->name('posts');

    // Route::get('/repos', 'UserController@getRepos')->name('repos');

});
