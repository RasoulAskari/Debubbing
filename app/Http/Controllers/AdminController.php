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

        return response()->json([
            'access_token' => 'Do you know you are my love!',
            'token_type' => 'Bearer',
        ]);
    }

    public function showUsers()
    {
        return User::latest()->get();
    }
}
