<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        // Check if provider is user (role_id 3)
        if (Auth::check() && Auth::user()->role_id == 3) {
            return $next($request);  
        }

        return redirect('/login')->with('status', 'Access Denied');
    }
}
