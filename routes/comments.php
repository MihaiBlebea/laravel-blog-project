<?php

Route::get('/comments', 'App\Http\Controllers\CommentController@index')->name('comment.index');

Route::get('/comments/{post}', 'App\Http\Controllers\CommentController@getFromPost')->name('comment.post');

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function() {

    Route::get('/{comment}', 'App\Http\Controllers\CommentController@get')->name('get');

    Route::get('/approve/{comment}', 'App\Http\Controllers\CommentController@approve')->name('approve');

    Route::post('/store', 'App\Http\Controllers\CommentController@store')->name('store');

    Route::delete('/delete/{comment}', 'App\Http\Controllers\CommentController@delete')->name('delete');

});
