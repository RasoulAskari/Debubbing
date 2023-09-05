<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admins')->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'unAuthenticated',
                'error' => 'Incorrect user email or password',
            ]);
        } else {
            return $next($request);
        }
    }
}
