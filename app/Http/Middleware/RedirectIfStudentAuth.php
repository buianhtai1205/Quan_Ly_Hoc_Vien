<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfStudentAuth
{
    public function handle(Request $request, Closure $next, $guard = 'student')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('students.home');
        }

        return $next($request);
    }
}
