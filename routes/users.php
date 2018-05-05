<?php

Route::get('/auth/{driver_name}', 'Auth\SocialiteAuthController@redirectToProvider')->name('socialite.auth');

Route::get('/auth/redirect/{driver_name}', 'Auth\SocialiteAuthController@handleProviderCallback')->name('socialite.redirect');

Route::get('/users', 'UserController@users')->name('users');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function() {

    Route::get('/profile', 'UserController@get')->name('profile');

    Route::get('/update', 'UserController@getUpdate')->name('update');
    Route::post('/update', 'UserController@postUpdate')->name('update');

    Route::get('/new/post', 'UserController@createPost')->name('post.new');
    Route::get('/posts', 'UserController@getPosts')->name('posts');

    Route::get('/repos', 'UserController@getRepos')->name('repos');
});
