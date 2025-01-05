<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is user (role_id 2)
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);  
        }

        return redirect('/')->with('status', 'Access Denied');
    }
}
