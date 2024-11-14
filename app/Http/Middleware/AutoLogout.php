<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expireTime = config('session.lifetime') * 60; // Convert minutes to seconds
            if (time() - session()->get('lastActivityTime') > $expireTime) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['message' => 'You have been logged out due to inactivity.']);
            }
            session()->put('lastActivityTime', time());
        }

        return $next($request);
}

}
