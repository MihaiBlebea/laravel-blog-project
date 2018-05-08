<?php

// Socialite routes

Route::get('/auth/{driver_name}', 'Auth\SocialiteAuthController@redirectToProvider')->name('socialite.auth');

Route::get('/auth/redirect/{driver_name}', 'Auth\SocialiteAuthController@handleProviderCallback')->name('socialite.redirect');

// Get all users
Route::get('/users', 'UserController@users')->name('users');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function() {

    // Get a specific user's profile
    Route::get('/profile/{user?}', 'UserController@profile')->name('profile');

    // Update a user's profile, GET and POST routes
    Route::get('/update', 'UserController@getUpdate')->name('update');
    Route::post('/update', 'UserController@postUpdate')->name('update');

    // Subscribe & unsubscribe a user from following a developer
    Route::get('/subscribe/{user}', 'UserController@subscribe')->name('subscribe');
    Route::get('/unsubscribe/{user}', 'UserController@unsubscribe')->name('unsubscribe');

    // Get user's subscriptions, if no user is provided, then use the logged in user
    Route::get('/subscriptions/{user?}', 'UserController@getSubscriptions')->name('subscriptions');
});
