<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();

                $token = $user->createToken('AuthToken')->accessToken;

                return response()->json(['token' => $token], 200);
            }
        } catch (\Exception $e) {
            return back()->withErrors('Something went wrong');
        }


        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        try {
            if (!Auth::guard('api')->check()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $user = Auth::guard('api')->user();
            $user->tokens()->delete();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $e) { 
            return back()->withErrors('Something went wrong');
        }
    }
}
