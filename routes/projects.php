<?php

Route::get('/projects/{user?}', 'ProjectController@index')->name('projects.index');

Route::get('/project/test/{project}', 'ProjectController@get')->name('project.get');

Route::group([
    'prefix' => 'admin/projects',
    'as' => 'project.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', 'ProjectController@manage')->name('manage');

    Route::get('/store', 'ProjectController@store')->name('store');
    Route::post('/store', 'ProjectController@store')->name('store');

    Route::get('/update/{project}', 'ProjectController@update')->name('update');
    Route::post('/update/{project}', 'ProjectController@update')->name('update');

    Route::get('/delete/{project}', 'ProjectController@delete')->name('delete');
});
