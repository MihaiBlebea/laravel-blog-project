<?php

Route::get('/projects/{user?}', 'ProjectController@index')->name('projects.index');

Route::get('/project/{project}', 'ProjectController@get')->name('project.get');

Route::group([
    'prefix' => 'admin/projects',
    'as' => 'project.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', 'ProjectController@manage')->name('manage');

    Route::get('/status/{project}', 'ProjectController@status')->name('status');

    Route::get('/store', 'ProjectController@getStore')->name('store');
    Route::post('/store', 'ProjectController@postStore')->name('store');

    Route::get('/update/{project}', 'ProjectController@getUpdate')->name('update');
    Route::post('/update/{project}', 'ProjectController@postUpdate')->name('update');

    Route::get('/delete/{project}', 'ProjectController@delete')->name('delete');
});
