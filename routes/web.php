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
    Route::get('/cmsPages', 'HomeController@cmsPages')->name('cmsPages');

    Route::post('/products', 'ApiController@productSearch')->name('products');
    Route::post('/categories', 'ApiController@categoriesSearch')->name('categories');
    Route::post('/cmsPages', 'ApiController@cmsPagesSearch')->name('cmsPages');

    Route::post('/local/product', 'LocalController@productStore')->name('local.store.product');
    Route::post('/local/category', 'LocalController@categoryStore')->name('local.store.category');
    Route::post('/local/cmsPages', 'LocalController@cmsPagesStore')->name('local.store.cmsPages');

    Route::post('/local/update', 'LocalController@localUpdate')->name('local.update');
    Route::get('/local', 'LocalController@index')->name('local.index');
    Route::post('/local', 'LocalController@index')->name('local.index');
    Route::delete('/local/{local}', 'LocalController@destroy')->name('local.destroy');

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
