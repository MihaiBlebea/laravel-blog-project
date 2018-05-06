<?php

Route::get('/categories', 'CategoryController@index')->name('category.index');

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {

    Route::get('/store', 'CategoryController@getStore')->name('store');
    Route::post('/store', 'CategoryController@postStore')->name('store');

    Route::get('/update/{category}', 'CategoryController@getUpdate')->name('update');
    Route::post('/update/{category}', 'CategoryController@postUpdate')->name('update');

    Route::get('/delete/{category}', 'CategoryController@delete')->name('delete');
});
