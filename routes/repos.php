<?php

Route::get('/repos', 'RepoController@index')->name('repos');

Route::group(['prefix' => 'repo', 'as' => 'repo.'], function() {

});
