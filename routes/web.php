<?php

use App\Models\User;
use App\Models\Schedule;
use Carbon\Carbon;

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Hide registration route //
// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


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
Route::get('/blog/{category}/{post}', 'BlogController@post')->name('blog.post')->middleware('track');

// Display results for blog search (will have to change this)
Route::post('/search', 'SearchController@search')->name('search');

Route::post('/message/send', 'MessageController@send')->name('message.send');

Route::get('/admin/messages/manage', 'MessageController@manage')->name('message.manage');

Route::get('/message/{message}', 'MessageController@read')->name('message.read');

Route::delete('/message/{message}', 'MessageController@delete')->name('message.delete');
