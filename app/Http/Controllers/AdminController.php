<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Laravel\Sanctum\PersonalAccessToken;

class AdminController extends Controller
{

    public function login(Request  $request)
    {

        if (Auth::guard('admins')->attempt($request->only(['email', 'password']))) {
            $user = Admin::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
    }

    public function showUsers(Request $request)
    {
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
