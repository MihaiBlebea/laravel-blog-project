<?php

Route::get('/comments', 'CommentController@index')
        ->name('comment.index')
        ->middleware('role:admin');

Route::get('/comments/{post}', 'CommentController@getFromPost')->name('comment.post');

Route::get('/comments/{post}/approved', 'CommentController@getApprovedFromPost')
        ->name('comment.approved.post')
        ->middleware('role:user,admin');

Route::group(['prefix' => 'comment', 'as' => 'comment.'], function() {

    Route::get('/approve/{comment}', 'CommentController@approve')
            ->name('approve')
            ->middleware('role:admin');

    Route::post('/store', 'CommentController@store')->name('store');

    Route::get('/{comment}', 'CommentController@get')->name('get');

    Route::delete('/delete/{comment}', 'CommentController@delete')->name('delete');

});
