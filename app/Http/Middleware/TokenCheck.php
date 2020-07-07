<?php

namespace App\Http\Middleware;

use Closure;

class TokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->bearerToken() != config('app.api_token'))
        {
            return response()->json([
                'message' => 'Wrong token'], 404);
        }

        return $next($request);
    }
}
