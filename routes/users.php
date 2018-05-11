<?php

// Get all users
Route::get('/users', 'UserController@users')->name('users');

// End user routes
Route::group(['prefix' => 'user', 'as' => 'user.'], function() {

    // Get a specific user's profile
    Route::get('/profile/{user?}', 'UserController@profile')->name('profile');

    // Subscribe & unsubscribe a user from following a developer
    Route::get('/subscribe/{user}', 'UserController@subscribe')->name('subscribe');

    Route::get('/unsubscribe/{user}', 'UserController@unsubscribe')->name('unsubscribe');

});

Route::get('/admin', 'UserController@adminPanel')->name('admin.panel')->middleware(['auth', 'role:user,admin']);

// Admin routes
Route::group(['prefix' => 'admin/users', 'as' => 'user.', 'middleware' => ['auth', 'role:user,admin']], function() {

    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

    Route::get('/manage', 'UserController@manageUsers')->name('manage');

    // Update a user's profile, GET and POST routes
    Route::get('/update', 'UserController@getUpdate')->name('update');
    Route::post('/update', 'UserController@postUpdate')->name('update');

    // Get user's subscriptions, if no user is provided, then use the logged in user
    Route::get('/subscriptions/{user?}', 'UserController@getSubscriptions')->name('subscriptions');
});
