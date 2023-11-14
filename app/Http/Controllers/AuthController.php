<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Authenticate the user and generate a token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'errors' => ["Password incorrect for: {$request->username}"],
                ],
            ], 401);
        }

        // Genera el token JWT
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'meta' => [
                'success' => true,
                'errors' => [],
            ],
            'data' => [
                'token' => $token,
                'minutes_to_expire' => config('jwt.ttl') / 60, // minutos
            ],
        ]);
    }
}
