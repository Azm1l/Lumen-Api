<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\ModelUsers;

class JwtMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->bearerToken();
        if (!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'success' => false,
                'message' => 'Token tidak ada'
            ], 401);
        }
        try {
            $credentials = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kesalahan dalam validasi token' //,
                //'error' => $e->getMessage()
            ], 400);
        }
        $user = ModelUsers::find($credentials->sub);
        $request->auth = $user;
        return $next($request);
    }
}
