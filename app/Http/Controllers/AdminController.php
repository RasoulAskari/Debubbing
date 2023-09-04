<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


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


        // Check User Credentials For Login
        //     if (Auth::attempt($request->only(['email', 'password']))) {
        //         // create token for logged user
        //         $token = Auth::admin()->createToken($request->input('email'))->plainTextToken;

        //         return response()->json(['result' => true, "user" => Auth::admin(), "token" => $token], 200);
        //     }
        //     return response()->json(["result" => false, "error" => "پسورد یا ایمل نادرست میباشد!"], 401);
        // }
    }
}
