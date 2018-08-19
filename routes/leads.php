<?php

Route::group([
    'prefix' => 'leads',
    'as' => 'lead.'
], function() {

    Route::post('/store', 'LeadController@store')->name('store');

});
