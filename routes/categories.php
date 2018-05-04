<?php

Route::get('/categories', 'CategoryController@index')->name('category.index');

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {

    Route::get('/{category}', 'CategoryController@get')->name('get');

    Route::post('/store', 'CategoryController@store')->name('store');

    Route::delete('/delete/{category}', 'CategoryController@delete')->name('delete');

});
