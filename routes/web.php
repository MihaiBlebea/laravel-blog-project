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

Route::get('/blog/{category}', 'BlogController@index');
