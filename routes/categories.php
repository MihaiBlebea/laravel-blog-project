<?php

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {

    Route::get('/{category}', 'App\Http\Controllers\CategoryController@get')->name('get');

    Route::post('/store', 'App\Http\Controllers\CategoryController@store')->name('store');

    Route::delete('/delete/{category}', 'App\Http\Controllers\CategoryController@delete')->name('delete');

});
