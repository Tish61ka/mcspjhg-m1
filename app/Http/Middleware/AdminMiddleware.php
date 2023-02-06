<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
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
        $user = User::where('token', '!=', null)->where('isAdmin', true)->first();
        if(!$user){
            return response()->json([
                'message' => 'Доступ запрещен'
            ]);
        } else {
            return $next($request);
        }
    }
}
