<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('/');
Route::get('logout', 'Auth\LoginController@logout');

Route::group([ 'middleware' => 'auth' ], function () {
    Route::get('/home', 'HomeController@index');

    /*
    |--------------------------------------------------------------------------
    | Type CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'types.', 'prefix' => 'types' ], function ()
    {
        Route::get('', 'TypeController@index')->name('index');
        Route::get('create', 'TypeController@create')->name('create');
        Route::post('', 'TypeController@store')->name('store');
        Route::get('{type}/edit', 'TypeController@edit')->name('edit');
        Route::put('{type}', 'TypeController@update')->name('update');
        Route::delete('{type}', 'TypeController@destroy')->name('destroy');
    });
});

Route::get('array', 'UserController@array');
