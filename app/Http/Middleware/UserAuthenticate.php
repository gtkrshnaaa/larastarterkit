<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'user') {
            return redirect()->route('user.login')->withErrors(['email' => 'Unauthorized access']);
        }

        return $next($request);
    }
}
