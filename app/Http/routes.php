<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'app'], function () {
    get('/{slug?}', 'AppController@getIndex')->where('slug', '(.*)?');
});

Route::group(['prefix' => 'api'], function () {
    Route::controller('search-stub', 'Api\SearchStubController');
    Route::controller('search', 'Api\SearchController');
    Route::controller('animal-group', 'Api\AnimalGroupController');
    Route::controller('author', 'Api\AuthorController');
    Route::controller('media-type', 'Api\MediaTypeController');
    Route::controller('museum', 'Api\MuseumController');

    Route::get('/', function () {
        return view('api.index');
    });
});
