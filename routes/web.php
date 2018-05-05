<?php

use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test/{user}', function(User $user) {
    dd($user->role->permissions);
});

Route::view('/admin', 'admin.users');

Route::get('/blog', 'BlogController@index')->name('blog.index');

Route::get('/blog/{category}', 'BlogController@category')->name('blog.category');

Route::get('/blog/{category}/{post}', 'BlogController@post')->name('blog.post');

Route::post('/search', 'SearchController@search')->name('search');

// Tests
Route::get('/test/{user}', function(User $user) {
    $result = $user->subscriptions[1]->subscribed;
    dd($result);
});
