<?php

Route::group(['prefix' => 'social', 'as' => 'share.'], function() {

    Route::get('/share/{driver}/{post}', 'SocialShareController@share')->name('share');

});
