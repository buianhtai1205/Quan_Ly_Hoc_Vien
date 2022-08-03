<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfTeacherAuth
{
    public function handle(Request $request, Closure $next, $guard = 'teacher')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('teachers.home');
        }

        return $next($request);
    }
}
