<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            switch ($userRole) {
                case 1:
                    return redirect()->route('admin');
                case 2:
                    return redirect()->route('profesor');
                case 3:
                    return redirect()->route('dashboard');
                default:
                    return redirect('/');
            }
        }

        return $next($request);
    }
}
