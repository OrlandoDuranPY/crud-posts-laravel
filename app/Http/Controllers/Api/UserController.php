<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'data' => [
                    'user' => $user,
                    'token' => $token
                ],
                'message' => __('success'),
                'status' => 200
            ];
            $status = 200;
        } else {
            $response = [
                'message' => __('user not found'),
                'status' => 422
            ];
            $status = 422;
        }

        return response()->json($response, $status);
    }
}
