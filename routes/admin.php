<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('/users', 'AdminController@users')->name('users');

    Route::get('/posts', 'AdminController@posts')->name('posts');

    Route::get('/comments', 'AdminController@comments')->name('comments');

    Route::get('/categories', 'AdminController@categories')->name('categories');

});
