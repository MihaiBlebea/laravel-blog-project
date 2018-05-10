<?php

Route::get('/posts/{user?}', 'PostController@index')->name('post.index')->middleware('role:user,admin');

Route::group([
    'prefix' => 'post',
    'as' => 'post.',
    'middleware' => 'role:user,admin'
], function() {

    // Route::get('/blog/{category}/{post}', 'PostController@get')->name('get');

    Route::get('/store', 'PostController@getStore')->name('store');
    Route::post('/store', 'PostController@postStore')->name('store');

    Route::get('/update/{post}', 'PostController@getUpdate')->name('update');
    Route::post('/update/{post}', 'PostController@postUpdate')->name('update');

    Route::delete('/delete/{post}', 'PostController@delete')->name('delete');

    Route::get('publish/{post}', 'PostController@publish')->name('publish');

});
