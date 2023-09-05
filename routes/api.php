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

Route::middleware('auth.admin')->middleware('auth:sanctum')->group(function () {
    return Route::get('user', [AdminController::class, 'showUsers']);
});



Route::middleware('auth:sanctum')->get('/user/email', function () {
});







Route::post('login', [AuthenticateController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'login']);
