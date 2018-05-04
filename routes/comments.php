<?php

Route::get('/comments', 'CommentController@index')->name('comment.index');

Route::get('/comments/{post}', 'CommentController@getFromPost')->name('comment.post');

Route::get('/comments/{post}/approved', 'CommentController@getApprovedFromPost')->name('comment.approved.post');

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function() {

    Route::get('/{comment}', 'CommentController@get')->name('get');

    Route::get('/approve/{comment}', 'CommentController@approve')->name('approve');

    Route::post('/store', 'CommentController@store')->name('store');

    Route::delete('/delete/{comment}', 'CommentController@delete')->name('delete');

});
