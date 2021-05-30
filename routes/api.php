<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([ 'middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');
});

Route::group([ 'middleware' => 'jwt.auth', 'prefix' => 'admin'], function ($router) {
    Route::group(['prefix' => 'users'], function ($user) {
        Route::get('', 'api\UserController@index');
        Route::post('', 'api\UserController@store');
        Route::put('{id}', 'api\UserController@update');
        Route::delete('{id}', 'api\UserController@destroy');
    });
});

Route::get('pruebas', 'api\UserController@probando');

