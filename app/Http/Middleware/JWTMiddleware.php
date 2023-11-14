<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            // Captura de excepciones relacionadas con JWT, puedes personalizar esto según tus necesidades
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
