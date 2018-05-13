<?php

Route::group(['prefix' => 'social', 'as' => 'share.'], function() {

    Route::get('/share/linkedin/{post}', 'SocialShareController@shareLinkedin')->name('linkedin');

});
