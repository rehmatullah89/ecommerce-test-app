<?php
namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        try {
            // Try to parse the token and authenticate the user
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            // Return unauthorized if the token is not valid or expired
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
