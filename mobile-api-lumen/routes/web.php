<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Model\User;

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

//routes for the frontend authentication and functions
$router->get('/', 'Auth\LoginController@login');

//routes for the authenticated apis
$router->post('auth/login', [
    'uses' => 'Auth\AuthController@authenticate'
]);

$router->group([ 'middleware' => 'jwt.auth' ], function () use ($router) {
    $router->get('users', function () {
        $users = User::all();

        return response()->json($users);
    });
});
