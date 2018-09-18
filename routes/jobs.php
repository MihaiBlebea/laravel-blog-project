<?php

Route::group([
    'prefix' => 'admin/jobs',
    'as' => 'job.',
    'middleware' => 'role:admin'
], function() {

    Route::get('/manage', 'JobController@manage')->name('manage');

    Route::get('/store', 'JobController@getStore')->name('store');
    Route::post('/store', 'JobController@postStore')->name('store');

    Route::get('/update/{job}', 'JobController@getUpdate')->name('update');
    Route::post('/update/{job}', 'JobController@postUpdate')->name('update');

    Route::get('/delete/{job}', 'JobController@delete')->name('delete');

});
