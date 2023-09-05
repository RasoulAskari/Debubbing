<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\ApiToken;
use Exception;

use function PHPUnit\Framework\returnSelf;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);

            if ($token->tokenable_type == "App\\Models\\Admin") {
                return $next($request);
            } else {
                return response()->json([
                    'message' => 'failed'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'catch'
            ]);
        }
    }
}
