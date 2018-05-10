<?php

// status can be 'published' or 'unpublished' or null
Route::get('/pages/{status?}', 'PageController@pages')->name('pages')->middleware('role:admin');

Route::group([
    'prefix' => 'page',
    'as' => 'page.',
    'middleware' => 'role:admin'
], function() {

    Route::get('/toggle/{page}', 'PageController@togglePublish')->name('publish');

    Route::get('/{type}/{page}', 'PageController@page')->name('get');

});
