<?php

Route::group([
    'prefix' => 'admin/schedule',
    'as' => 'schedule.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', 'ScheduleController@index')->name('manage');

    Route::get('/store', 'ScheduleController@getStore')->name('store');
    Route::post('/store', 'ScheduleController@postStore')->name('store');
});
