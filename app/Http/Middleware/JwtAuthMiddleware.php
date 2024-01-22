<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use JWTAuth;
//use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class JwtAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Attempt to decode the token and verify the user
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            // Token is invalid or user not found
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Attach the authenticated user to the request
        $request->attributes->add(['user' => $user]);

        return $next($request);
    }
}
