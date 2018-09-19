<?php

Route::group([
    'prefix' => 'admin/languages',
    'as' => 'language.',
    'middleware' => 'role:admin'
], function() {

    Route::get('/manage', 'LanguageController@manage')->name('manage');

    Route::get('/store', 'LanguageController@getStore')->name('store');
    Route::post('/store', 'LanguageController@postStore')->name('store');

    Route::get('/update/{language}', 'LanguageController@getUpdate')->name('update');
    Route::post('/update/{language}', 'LanguageController@postUpdate')->name('update');

    Route::get('/delete/{language}', 'LanguageController@delete')->name('delete');

});
