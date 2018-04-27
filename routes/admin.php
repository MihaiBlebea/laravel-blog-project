<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('users');

    Route::get('/posts', 'App\Http\Controllers\AdminController@posts')->name('posts');

    Route::get('/comments', 'App\Http\Controllers\AdminController@comments')->name('comments');

    Route::get('/categories', 'App\Http\Controllers\AdminController@categories')->name('categories');

});
