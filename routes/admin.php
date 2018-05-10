<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    // Manage users
    Route::get('/users', 'AdminController@users')->name('users');

    Route::get('/profile', 'UserController@profile')->name('profile');

    Route::get('/profile/update', 'UserController@getUpdate')->name('profile.update');

    Route::post('/profile/update', 'UserController@postUpdate')->name('profile.update');

    // Manage comments
    Route::get('/comments', 'AdminController@comments')->name('comments');

});
