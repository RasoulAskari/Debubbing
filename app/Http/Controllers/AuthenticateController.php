<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login(Request  $request)
    {
        // Check User Credentials For Login
        if (Auth::attempt($request->only(['phone_no', 'password']))) {
            // create token for logged user
            $token = Auth::user()->createToken($request->input('email'))->plainTextToken;

            return response()->json(['result' => true, "user" => Auth::user(), "token" => $token], 200);
        }
        return response()->json(["result" => false, "error" => "پسورد یا ایمل نادرست میباشد!"], 401);
    }
}
