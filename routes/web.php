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
    Route::get('/urlKeys', 'HomeController@urlKeys')->name('urlKeys');
    Route::get('/search', 'HomeController@search')->name('search');

    Route::post('/products', 'ApiController@productSearch')->name('products');
    Route::post('/categories', 'ApiController@categoriesSearch')->name('categories');
    Route::post('/cmsPages', 'ApiController@cmsPagesSearch')->name('cmsPages');

    Route::post('/local/product', 'LocalController@productStore')->name('local.store.product');
    Route::post('/local/aggregation', 'LocalController@aggregationStore')->name('local.store.aggregation');
    Route::post('/local/category', 'LocalController@categoryStore')->name('local.store.category');
    Route::post('/local/cmsPages', 'LocalController@cmsPagesStore')->name('local.store.cmsPages');
    Route::post('/local/urlKeys', 'LocalController@urlKeysStore')->name('local.store.urlKeys');
    Route::post('/local/search', 'LocalController@searchStore')->name('local.store.search');

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

    /*
    |--------------------------------------------------------------------------
    | Landing Page CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'landingPage.', 'prefix' => 'landingPage' ], function ()
    {
        Route::get('', 'LandingPageController@index')->name('index');
        Route::get('create', 'LandingPageController@create')->name('create');
        Route::post('', 'LandingPageController@store')->name('store');
        Route::get('{landingPage}/edit', 'LandingPageController@edit')->name('edit');
        Route::put('{landingPage}', 'LandingPageController@update')->name('update');
        Route::delete('{landingPage}', 'LandingPageController@destroy')->name('destroy');

        Route::get('{landingPage}/entity', 'LandingPageController@landingEntity')->name('entity');
        Route::post('/entity/update', 'LandingPageController@landingEntityUpdate')->name('entity.update');
        Route::delete('/entity/{landingPageEntity}', 'LandingPageController@entityDestroy')->name('entity.destroy');

        Route::post('/product', 'LandingPageController@productStore')->name('store.product');
        Route::post('/category', 'LandingPageController@categoryStore')->name('store.category');
    });
});

Route::get('array', 'UserController@array');
