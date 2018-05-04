<?php

Route::get('/posts', 'PostController@index')->name('post.index');

Route::group(['prefix' => 'post', 'as' => 'post.'], function() {

    Route::get('/{post}', 'PostController@get')->name('get');

    Route::post('/store', 'PostController@store')->name('store');

    Route::delete('/delete/{post}', 'PostController@delete')->name('delete');

    Route::get('publish/{post}', 'PostController@publish')->name('publish');
});
