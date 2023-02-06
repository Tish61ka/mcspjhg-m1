<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('token', '!=', null)->first();
        if(!$user){
            return response()->json([
                'message' => 'Доступ запрещен'
            ]);
        } else {
            return $next($request);
        }
    }
}
