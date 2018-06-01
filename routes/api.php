<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => []], function() {

    // Upload API routes
    Route::post('/upload/post', 'Api\AutosaveController@autosavePost');

    Route::post('/upload/project', 'Api\AutosaveController@autosaveProject');

    Route::post('/upload/profile', 'Api\AutosaveController@autosaveProfile');

    // Tracking API routes
    Route::get('/tracking', 'Api\TrackingController@getTrackingData');

    // Images API routes
    Route::get('/images/{user}', 'Api\ImageController@getUserImages');

    Route::post('/images/{user}', 'Api\ImageController@storeUserImages');

    Route::post('/image/update/{image}', 'Api\ImageController@update');

    Route::get('/image/delete/{image}', 'Api\ImageController@delete');

    // Project imagesy
    Route::get('/images/project/{project}', 'Api\ProjectController@getProjectImages');

    // Get posts by user
    Route::get('/posts/user/{user}', 'Api\PostController@getUserPosts');

    Route::post('/schedule/user/{user}', 'Api\ScheduleController@storeSchedule');

    Route::get('/schedule/user/{user}', 'Api\ScheduleController@getUserSchedule');

});
