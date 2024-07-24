<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//     public function handle($request, Closure $next)
// {
//     $user = auth()->user();

//     if (is_null($user)) {
//         return response()->json(['error' => 'Unauthorized access'], 401);
//     }

//     if (!$user->is_admin) {
//         return response()->json(['error' => 'Forbidden'], 403);
//     }

//     return $next($request);
// }

    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()){
            if(Auth::user()->is_admin== 1 ){
                return $next($request);
            }
        else{
            return response()->json('ffffffffffffffffffffffffffffffffffff');
        }
    }
}
//return $next($request);