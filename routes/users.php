<?php

Route::get('/auth/{driver_name}', 'Auth\SocialiteAuthController@redirectToProvider')->name('socialite.auth');

Route::get('/auth/redirect/{driver_name}', 'Auth\SocialiteAuthController@handleProviderCallback')->name('socialite.redirect');

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {

    Route::get('/profile/{user}', 'UserController@get')->name('profile');

    Route::get('/update/{user}', 'UserController@getUpdate')->name('update');
    Route::post('/update/{user}', 'UserController@postUpdate')->name('update');

    Route::get('/posts/{user}', 'UserController@getPosts')->name('posts');

    Route::get('/repos/{user}', 'UserController@getRepos')->name('repos');
});
