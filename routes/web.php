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

Route::get('administrator/login', 'Auth\LoginController@showLoginForm')->name('administrator.login');
Route::get('logout', 'Auth\LoginController@logout');

Route::group([ 'middleware' => 'auth', 'prefix' => 'backend' ], function () {
    Route::get('/home', 'HomeController@index');
});

//routes for frontend
Route::get('/', 'FrontendController@home');
Route::get('about', 'FrontendController@about');
Route::get('bod', 'FrontendController@bod');
Route::get('contact', 'FrontendController@contact');
Route::get('services', 'FrontendController@services');
Route::get('training', 'FrontendController@training');
Route::get('news', 'FrontendController@news');