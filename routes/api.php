<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => []], function() {

    Route::post('/upload/post', 'ApiController@autosavePost');

    Route::post('/upload/project', 'ApiController@autosaveProject');

    Route::post('/upload/profile', 'ApiController@autosaveProfile');

});
