<?php

Route::get('/posts', 'PostController@index')->name('post.index');

Route::get('/posts/{user}', 'PostController@userPosts')->name('post.user');

Route::group(['prefix' => 'post', 'as' => 'post.'], function() {

    Route::get('/{post}', 'PostController@get')->name('get');

    Route::post('/store', 'PostController@store')->name('store');

    Route::get('/update/{post}', 'PostController@getUpdate')->name('update');
    Route::post('/update/{post}', 'PostController@postUpdate')->name('update');

    Route::delete('/delete/{post}', 'PostController@delete')->name('delete');

    Route::get('publish/{post}', 'PostController@publish')->name('publish');
});
