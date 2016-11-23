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
Route::group(['middleware' => 'cors'], function () {
    Route::post('/login', 'AuthenticationController@authenticate');
    Route::get('/login/user', 'AuthenticationController@getAuthenticatedUser');
    Route::post('/register', 'AuthenticationController@register');
    Route::post('/id', 'AuthenticationController@getLastInsertedMaximumUserId');
});

