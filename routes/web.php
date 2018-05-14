<?php

use App\Models\User;

Auth::routes();

// Socialite routes
Route::get('/auth/{driver_name}', 'Auth\SocialiteAuthController@redirectToProvider')->name('socialite.auth');

Route::get('/auth/redirect/{driver_name}', 'Auth\SocialiteAuthController@handleProviderCallback')->name('socialite.redirect');

// Display the categories from witch to select
Route::get('/blog', 'BlogController@blog')->name('blog');

// Display all posts based on some rules
Route::get('/blog/index', 'BlogController@index')->name('blog.index');

// Display all posts from one category
Route::get('/blog/{category}', 'BlogController@category')->name('blog.category');

// Display all posts for a user
Route::get('/blog/dev/{user}', 'BlogController@userPosts')->name('blog.user');

// Display one specific post
Route::get('/blog/{category}/{post}', 'BlogController@post')->name('blog.post');

// Display results for blog search (will have to change this)
Route::post('/search', 'SearchController@search')->name('search');

Route::get('/test', function() {

    dd($result);
});
