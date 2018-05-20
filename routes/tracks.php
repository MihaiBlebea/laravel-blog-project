<?php

Route::group([
    'prefix' => 'admin/tracking',
    'as' => 'track.',
    'middleware' => 'role:admin'
], function() {

    Route::get('/manage', 'TrackingController@manage')->name('manage');

});
