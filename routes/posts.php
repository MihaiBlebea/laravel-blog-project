<?php

Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('post.index');

Route::group(['prefix' => 'post', 'as' => 'post.'], function() {

    Route::get('/{post}', 'App\Http\Controllers\PostController@get')->name('get');

    Route::post('/store', 'App\Http\Controllers\PostController@store')->name('store');

    Route::delete('/delete/{post}', 'App\Http\Controllers\PostController@delete')->name('delete');

});
