<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Authenticate;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AdminController::class, 'showUsers']);
});



Route::middleware('auth:sanctum')->get('/user/email', function () {
    // Retrieve the authenticated user using the 'sanctum' guard
    $user = Auth::guard('sanctum')->user();

    $token = PersonalAccessToken::where('token', hash('sha256', $tokenValue))->first();


    // Check if the user is authenticated
    if ($user) {
        // Get the user's email

        return response()->json(['email' => $user]);
    }

    return response()->json(['message' => 'User not authenticated'], 401);
});







Route::post('login', [AuthenticateController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'login']);
