<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Redirect to login if admin session not set
        if (!$request->session()->has('admin')) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
