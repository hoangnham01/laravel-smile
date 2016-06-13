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

Route::get('layout', function(){
    return view(request('file', 'backend.dashboard.index'));
});



Route::group(['prefix' => BACKEND_PREFIX, 'namespace' => 'Backend'], function () {

    Route::get('login', ['as' => 'backend.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'backend.postLogin', 'uses' => 'AuthController@postLogin']);
    Route::post('forgot-password', ['as' => 'backend.forgot-password', 'uses' => 'AuthController@postLogin']);
    Route::post('reset-password', ['as' => 'backend.reset-password', 'uses' => 'AuthController@postLogin']);

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/logout', ['as' => 'backend.accounts.logout', 'uses' => 'AuthController@getLogout']);
        Route::get('/profile', ['as' => 'backend.accounts.profile', 'uses' => 'DashboardController@index']);

        Route::resource('users', 'UserController', ['names' => customRouteName('users', 'backend')]);

        Route::get('/', ['as' => 'backend.dashboard.index', 'uses' => 'DashboardController@index']);

    });
});

Route::get('/', function () {
    return view('welcome');
});