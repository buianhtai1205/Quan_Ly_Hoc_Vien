<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAcademicAuth
{
    public function handle(Request $request, Closure $next, $guard = 'academic')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('academics.home');
        }

        return $next($request);
    }
}
