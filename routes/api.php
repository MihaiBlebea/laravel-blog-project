<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => []], function() {

    // Tracking API routes
    Route::get('/tracking', 'Api\TrackingController@getTrackingData');

    // Images API routes
    Route::get('/images/{user}', 'Api\ImageController@getUserImages');

    Route::post('/images/{user}', 'Api\ImageController@storeUserImages');

    Route::post('/image/update/{image}', 'Api\ImageController@update');

    Route::get('/image/delete/{image}', 'Api\ImageController@delete');

    // Project image
    Route::get('/images/project/{project}', 'Api\ProjectController@getProjectImages');

    // Category
    Route::get('/category/all', 'Api\CategoryController@getAll');

    Route::get('/category/posts/{category}', 'Api\CategoryController@getPosts');

    // Posts
    Route::get('/posts', 'Api\PostController@getAll');

});
