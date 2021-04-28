<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([ 'middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');
});

Route::group([ /* 'middleware' => 'jwt.auth', */ 'prefix' => 'admin'], function ($router) {
    Route::get('users', 'api\UserController@index');
});
