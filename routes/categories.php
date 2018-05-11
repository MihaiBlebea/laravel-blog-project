<?php

Route::get('/categories', 'CategoryController@index')->name('category.index')->middleware('role:admin');

Route::group([
    'prefix' => 'admin/categories',
    'as' => 'category.',
    'middleware' => 'role:admin'
], function() {

    Route::get('/', 'CategoryController@index')->name('manage');

    Route::get('/store', 'CategoryController@getStore')->name('store');
    Route::post('/store', 'CategoryController@postStore')->name('store');

    Route::get('/update/{category}', 'CategoryController@getUpdate')->name('update');
    Route::post('/update/{category}', 'CategoryController@postUpdate')->name('update');

    Route::get('/delete/{category}', 'CategoryController@delete')->name('delete');

});
