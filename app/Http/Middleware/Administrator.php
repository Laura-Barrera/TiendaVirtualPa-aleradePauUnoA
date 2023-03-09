<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrator
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->rol->description == 'administrator') {
            return $next($request);
        }

        return abort('403');
    }
}
