<?php

Route::group([
    'prefix' => 'admin/images',
    'as' => 'image.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', 'ImageController@index')->name('manage');

    Route::get('/image/{image}', 'ImageController@getImage')->name('get');

    Route::post('/image/upload', 'ImageController@upload')->name('upload');

    Route::get('/image/delete/{image}', 'ImageController@delete')->name('delete');

});
