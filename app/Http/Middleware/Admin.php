<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'System') {
            return $next($request);
        }
    
        // Redirect or return a response indicating access denied for non-System users.
        return redirect()->route('home')->with('error', 'Access denied: You do not have permission to access the admin page.');
    }
}
