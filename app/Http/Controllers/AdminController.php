<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;


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
        $user =  User::latest()->get();
        return response()->json([
            'user' => $user,
            'request' => $request
        ]);
    }
}
