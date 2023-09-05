<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Authenticate;

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

Route::get('/user', [AdminController::class, 'showUsers'])->middleware('auth.admin');

Route::post('login', [AuthenticateController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'login']);
