<?php

// Route::get('/home', 'PageController@homePage');

Route::get('/', 'PageController@homePage')->name('home');

Route::group([
    'prefix' => 'admin/pages',
    'as' => 'page.',
    'middleware' => 'role:admin'
], function() {

    // status can be 'published' or 'unpublished' or null
    Route::get('/manage/{status?}', 'PageController@pages')->name('manage');

    Route::get('/toggle/{page}', 'PageController@togglePublish')->name('publish');

});

Route::get('/{page}', 'PageController@page')->name('page.get');
