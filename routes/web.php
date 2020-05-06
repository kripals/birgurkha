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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('/');
Route::get('logout', 'Auth\LoginController@logout');

Route::group([ 'middleware' => 'auth' ], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/products', 'HomeController@products')->name('products');
    Route::get('/categories', 'HomeController@categories')->name('categories');

    Route::post('/products', 'ApiController@productSearch')->name('products');
    Route::post('/categories', 'ApiController@categoriesSearch')->name('categories');
});
