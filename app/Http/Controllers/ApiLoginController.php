<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWT;

class ApiLoginController extends Controller
{
    public function login()
    {
        $credentials = request([ 'email', 'password' ]);
        if ( ! $token = auth('api')->attempt($credentials))
        {
            return response()->json([ 'error' => 'Unauthorized' ], 401);
        }

        return response()->json([
            'token'   => $token,
            'expires' => auth('api')->factory()->getTTL() * 2880,
        ]);
    }
}
