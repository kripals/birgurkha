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

Route::get('/home', 'HomeController@index')->name('home');
Route::group([ 'middleware' => 'auth', 'prefix' => 'backend' ], function () {
    /*
    |--------------------------------------------------------------------------
    | ews CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'news.', 'prefix' => 'news' ], function ()
    {
        Route::get('news', 'NewsController@index')->name('news');
        Route::get('create', 'NewsController@create')->name('create');
        Route::post('', 'NewsController@store')->name('store');
        Route::get('{news}/edit', 'NewsController@edit')->name('edit');
        Route::put('{news}', 'NewsController@update')->name('update');
        Route::delete('{news}', 'NewsController@destroy')->name('destroy');
    });
    
    /*
    |--------------------------------------------------------------------------
    | ews CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'slider.', 'prefix' => 'slider' ], function ()
    {
        Route::get('slider', 'SliderController@index')->name('slider');
        Route::get('create', 'SliderController@create')->name('create');
        Route::post('', 'SliderController@store')->name('store');
        Route::get('{news}/edit', 'SliderController@edit')->name('edit');
        Route::put('{news}', 'SliderController@update')->name('update');
        Route::delete('{news}', 'SliderController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | ews CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'popup.', 'prefix' => 'popup' ], function ()
    {
        Route::get('popup', 'PopupController@index')->name('popup');
        Route::get('create', 'PopupController@create')->name('create');
        Route::post('', 'PopupController@store')->name('store');
        Route::get('{news}/edit', 'PopupController@edit')->name('edit');
        Route::put('{news}', 'PopupController@update')->name('update');
        Route::delete('{news}', 'PopupController@destroy')->name('destroy');
    });
});

//routes for frontend
Route::get('/', 'FrontendController@home');
Route::get('about', 'FrontendController@about');
Route::get('bod', 'FrontendController@bod');
Route::get('contact', 'FrontendController@contact');
Route::get('services', 'FrontendController@services');
Route::get('training', 'FrontendController@training');
Route::get('news', 'FrontendController@news');
Route::get('news/{news}', 'FrontendController@newsSingle');