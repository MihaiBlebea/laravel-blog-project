<?php

use App\Models\User;

Auth::routes();

// Socialite routes
Route::get('/auth/{driver_name}', 'Auth\SocialiteAuthController@redirectToProvider')->name('socialite.auth');

Route::get('/auth/redirect/{driver_name}', 'Auth\SocialiteAuthController@handleProviderCallback')->name('socialite.redirect');

Route::get('/blog', 'BlogController@index')->name('blog.index');

Route::get('/blog/{category}', 'BlogController@category')->name('blog.category');

Route::get('/blog/dev/{user}', 'BlogController@userPosts')->name('blog.user');

Route::get('/blog/{category}/{post}', 'BlogController@post')->name('blog.post');

Route::post('/search', 'SearchController@search')->name('search');
