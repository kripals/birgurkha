<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'APILoginController@login');

Route::group([ 'middleware' => 'jwt.auth' ], function () {
    Route::get('/slider', 'ApiController@slidersApi');
    Route::get('/category', 'ApiController@categoryApi');
    Route::get('/product', 'ApiController@productApi');
});
