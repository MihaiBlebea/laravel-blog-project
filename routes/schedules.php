<?php

Route::group([
    'prefix' => 'admin/schedule',
    'as' => 'schedule.',
    'middleware' => 'role:admin,user'
], function() {

    Route::get('/manage', function() {
        return view('admin.schedules');
    })->name('manage');

});
