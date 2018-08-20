<?php

Route::group([
    'prefix' => 'admin/schedule',
    'as' => 'schedule.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', 'ScheduleController@index')->name('manage');

    Route::get('/social-tokens', 'ScheduleController@getSocialTokens')->name('social-tokens');

    Route::get('/add-token/{driver_name}', 'Auth\SocialiteAuthController@addToken')->name('add-token');

    Route::get('/remove-token/{driver_name}', 'Auth\SocialiteAuthController@removeToken')->name('remove-token');

    Route::get('/store', 'ScheduleController@getStore')->name('store');
    Route::post('/store', 'ScheduleController@postStore')->name('store');

    Route::get('/update/{schedule}', 'ScheduleController@getUpdate')->name('update');
    Route::post('/update/{schedule}', 'ScheduleController@postUpdate')->name('update');

    Route::get('/delete/{schedule}', 'ScheduleController@delete')->name('delete');
});
