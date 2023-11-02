<?php

namespace App\Http\Controllers;

use App\ModelUsers;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;


class AuthController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function jwt(ModelUsers $user)
    {

        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->user_id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
        ];
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    public function login(ModelUsers $user)
    {
        $this->validate($this->request, [
            'username'     => 'required|string',
            'password'  => 'required|string',
            'deviceId' => 'required|string',
        ]);

        $user = ModelUsers::where('username', $this->request->input('username'))->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Username does not exist.'
            ], 400);
        }

        if ($user->device_id == null) {
            $user->device_id = $this->request->input('deviceId');
            $user->save();
        } else if ($user->device_id != $this->request->input('deviceId')) {
            return response()->json([
                'success' => false,
                'message' => 'Device ID does not match.'
            ], 400);
        }

        if ($this->request->input('password') == $user->password) {
            return response()->json([
                'success' => true,
                'token' => $this->jwt($user),
                'user' => $user
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Username or password is wrong.'
        ], 400);
    }
}
