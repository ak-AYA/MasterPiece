<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if user is Admin (role_id 1)
            if (Auth::user()->role_id == 1) {
                return $next($request);  
            } else {
                return redirect('/')->with('status', 'Not Authorized');  
            }
        } else {
            return redirect('/login')->with('status', 'Please log in first'); 
        }
    }
    
}
