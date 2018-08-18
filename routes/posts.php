<?php

Route::group([
    'prefix' => 'admin/post',
    'as' => 'post.',
    'middleware' => 'role:user,admin'
], function() {

    Route::get('/manage/{user?}', 'PostController@index')->name('index');

    Route::get('/store', 'PostController@getStore')->name('store');
    Route::post('/store', 'PostController@postStore')->name('store');

    Route::get('/preview/{post}', 'PostController@preview')->name('preview');

    Route::get('/update/{post}', 'PostController@getUpdate')->name('update');
    Route::post('/update/{post}', 'PostController@postUpdate')->name('update');

    Route::get('/delete/{post}', 'PostController@delete')->name('delete');

    Route::get('/toggle/{post}', 'PostController@togglePublish')->name('publish');
    
});
